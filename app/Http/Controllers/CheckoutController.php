<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Users;
use App\Models\AddressUser;
use App\Models\DetailsOrder;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $payMethod = $request->payment_method;
        if ($payMethod == 'atm_payment') {
            $payment_method = "Thẻ ATM nội địa/Internet Banking (Hỗ trợ Internet Banking)";
        } else if ($payMethod == 'momo_payment_ATM') {
            $payment_method = "Thanh toán bằng ví MoMo (ATM)";
        } else if ($payMethod == 'momo_payment_QR') {
            $payment_method = "Thanh toán bằng ví MoMo (QR)";
        } else if ($payMethod == 'vnpay_payment') {
            $payment_method = "Thanh toán bằng VNPAY";
        } else if ($payMethod == 'paypal_payment') {
            $payment_method = "Thanh toán bằng PAYPAL";
        } else {
            $payment_method = "Thanh toán tiền mặt khi nhận hàng";
        }
        $order_code = $this->randomCode();
        $resultOrders = Orders::insert([
            'order_code' => $order_code,
            'id_user' => Session::get('id'),
            'fullname' => $request->fullname,
            'number_phone' => $request->number_phone,
            'address' => "$request->street, $request->ward, $request->district, $request->province",
            'payment_method' => $payment_method,
            'total_product_fee' => $request->total_product_fee,
            'transport_fee' => $request->transport_fee,
            'total_money' => $request->total_money,
            'state' => "Chờ xử lý",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $products = $request->products;
        foreach ($products as $key => $value) {
            $resultDOrder = DetailsOrder::insert([
                'order_code' =>  $order_code,
                'id_product' => $value['id'],
                'name' => $value['name'],
                'unit_of_measure' => 'kg',
                'quantity' =>  $value['quantity'],
                'price' => $value['price'],
                'discount' => $value['discount'],
                'into_money' =>  $value['quantity'] * floor(((int)$value['price'] / 1000) * (1 - ((int)$value['discount']) / 100)) * 1000,
                'id_category_product' => $value['id_category'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        $id_user = Session::get('id');
        $recipient = Users::find($id_user);
        $isMailer = Mail::to($recipient->email)->queue(new OrderMail($recipient));
        if ($resultOrders && $resultDOrder && $isMailer) {
            $address = AddressUser::where([
                ['id_user', $id_user],
                ['address_default', "$request->street|$request->ward|$request->district|$request->province"],
                ['number_phone', $request->number_phone]
            ])->get()->count();
            if ($address == 0) {
                AddressUser::insert([
                    'id_user' => $recipient->id,
                    'fullname' => $request->fullname,
                    'address_default' => "$request->street|$request->ward|$request->district|$request->province",
                    'number_phone' => $request->number_phone,
                    'state' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
            $data = [
                'id_user' => $id_user,
                'order_code' => $order_code,
                'total_product_fee' => $request->total_product_fee,
                'transport_fee' => $request->transport_fee,
                'total_money' => $request->total_money,
                'payment_method' => $payMethod,
                'id_authorization' => $recipient->id_authorization,
            ];
            if ($payMethod == 'momo_payment_ATM') {                 //PAYMENT ATM MOMO 
                Session::flash('orderSuccess', true);
                $requestType = "payWithATM";
                return $this->paymentMomo($data, $requestType);
            } elseif ($payMethod == 'momo_payment_QR') {            //PAYMENT QR MOMO     
                Session::flash('orderSuccess', true);
                $requestType = "captureWallet";
                return $this->paymentMomo($data, $requestType);
            } elseif ($payMethod == 'vnpay_payment') {              //PAYMENT VNPAY    
                Session::flash('orderSuccess', true);
                return $this->paymentVNPAY($data);
            } elseif ($payMethod == 'paypal_payment') {             //PAYMENT PAYPAL
                return $this->processTransaction($data);
            } else {
                Session::flash('orderSuccess', true);
                return Redirect::route('ordered', ['id' => $id_user]);
            }
        } else {
            Session::flash('orderFailed', false);
            return Redirect::route('ordered', ['id' => $id_user]);
        }
    }

    // PAYMENT MOMO
    public function paymentMomo($data, $requestType)
    {
        $id_user = $data['id_user'];
        $order_code = $data['order_code'];
        $total_money = $data['total_money'];
        $id_authorization = $data['id_authorization'];
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM MoMo";
        $amount = "$total_money";
        $orderId = "$order_code";
        if ($id_authorization == 3) {
            $urlTo = "http://127.0.0.1:8000/user/ordered/$id_user";
        } elseif ($id_authorization == 4) {
            $urlTo = "http://127.0.0.1:8000/user/facebook/ordered/$id_user";
        } else {
            $urlTo = "http://127.0.0.1:8000/user/google/ordered/$id_user";
        }
        $redirectUrl = "$urlTo";
        $ipnUrl = "$urlTo";
        $extraData = "";
        $requestId = "$order_code";
        $requestType = $requestType;
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        return Redirect::to($jsonResult['payUrl']);
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Content-Length: ' . strlen($data)]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    // PAYMENT VNPAY
    public function paymentVNPAY($data)
    {
        $id_user = $data['id_user'];
        $order_code = $data['order_code'];
        $total_money = $data['total_money'];
        $id_authorization = $data['id_authorization'];
        if ($id_authorization == 3) {
            $urlTo = "http://127.0.0.1:8000/user/ordered/$id_user";
        } elseif ($id_authorization == 4) {
            $urlTo = "http://127.0.0.1:8000/user/facebook/ordered/$id_user";
        } else {
            $urlTo = "http://127.0.0.1:8000/user/google/ordered/$id_user";
        }
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "$urlTo";
        $vnp_TmnCode = "X1NLWKWX"; //Mã website tại VNPAY 
        $vnp_HashSecret = "AUBNTSLYZMBPUMROKJVBJNSFBEYCAMFS"; //Chuỗi bí mật
        $vnp_TxnRef = $order_code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán bằng VNPAY";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $total_money * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if ($id_user) {
            return Redirect::to($vnp_Url);
        } else {
            echo json_encode($returnData);
        }
    }

    // PAYMENT PAYPAL
    public function processTransaction($data)
    {
        $provider = new PayPal;
        $total_money = ceil($data['total_money'] / 23000);
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction', ['id' => $data['id_user']]),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "$total_money"
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            Session::flash('orderFailed', false);
            return Redirect::route('ordered', ['id' => $data['id_user']]);
        } else {
            Session::flash('orderFailed', false);
            return Redirect::route('ordered', ['id' => $data['id_user']]);
        }
    }

    public function successTransaction($id_user, Request $request)
    {
        $provider = new PayPal;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            Session::flash('orderSuccess', true);
            return Redirect::route('ordered', ['id' => $id_user]);
        } else {
            Session::flash('orderFailed', false);
            return Redirect::route('ordered', ['id' => $id_user]);
        }
    }

    public function cancelTransaction()
    {
        Session::flash('cancelPaymentPayPal', "Hủy thanh toán PayPal");
        return back();
    }

    // RANDOM CODE
    public function randomCode()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $code .= $characters[$index];
        }
        return $code;
    }
}
