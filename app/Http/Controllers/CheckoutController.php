<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\CategoryProduct;
use App\Models\Products;
use App\Models\Orders;
use App\Models\Users;
use App\Models\DetailsOrder;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $payMethod = $request -> payment_method;
        if($payMethod == 'atm_payment') {
            $payment_method = "Thẻ ATM nội địa/Internet Banking (Hỗ trợ Internet Banking)";
        } else if ($payMethod == 'momo_payment') {
            $payment_method = "Thanh toán bằng ví MoMo";
        } else if ($payMethod == 'vnpay_payment') {
            $payment_method = "Thanh toán bằng VNPAY";
        } else {
            $payment_method = "Thanh toán tiền mặt khi nhận hàng";
        }
        $order_code = $this->randomCode();
        $resultOrders = Orders::insert([
            'order_code' => $order_code,
            'id_user' => Session::get('id'),
            'fullname' => $request -> fullname,
            'number_phone' => $request -> number_phone,
            'address' => $request -> address,
            'payment_method' => $payment_method,
            'total_product_fee' => $request -> total_product_fee,
            'transport_fee' => $request -> transport_fee,
            'total_money' => $request -> total_money,
            'state' => "Chờ xử lý",
            'note' => $request -> note,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $products = $request -> products;
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
            if($payMethod == 'momo_payment') {
                Session::flash('orderSuccess', true);
                return $this -> paymentMomo($id_user, $order_code, $request -> total_money);
            } else {
                Session::flash('orderSuccess', true);
                return Redirect::route('ordered', ['id' => $id_user]);
            }
        } else {
            Session::flash('orderFailed', false);
            return Redirect::route('ordered', ['id' => $id_user]);
        }
    }

    public function paymentMomo($id_user, $order_code, $total_money)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "$total_money";
        $orderId = "$order_code";
        $redirectUrl = "http://127.0.0.1:8000/user/ordered/$id_user";
        $ipnUrl = "http://127.0.0.1:8000/user/ordered/$id_user";
        $extraData = "";
        $requestId = "$order_code";
        $requestType = "payWithATM";
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
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function randomCode() {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $code .= $characters[$index];
        }
        return $code;
    }
}
