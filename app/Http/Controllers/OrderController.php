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
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index() {
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        return View::make('clients.layouts.order', compact([
            'category_product'
        ]));
    }

    public function viewOrdered($id) {
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        $ordered = Orders::where('id_user', $id) -> orderBy('tbl_orders.created_at', 'desc') -> get() -> toArray();
        $detailsOrder = [];
        foreach($ordered as $key => $order) {
            $products = DetailsOrder::join('tbl_products', 'tbl_details_order.id_product', '=', 'tbl_products.id') 
            -> where('order_code', $order['order_code']) -> get() -> toArray();
            array_push($detailsOrder, $products);
        }
        return View::make('clients.layouts.profile.ordered', compact([
            'category_product', 'ordered', 'detailsOrder'
        ]));
    }

    public function viewUserGgOrdered($id) {
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        $ordered = Orders::where('id_user', $id) -> orderBy('tbl_orders.created_at', 'desc') -> get() -> toArray();
        $detailsOrder = [];
        foreach($ordered as $key => $order) {
            $products = DetailsOrder::join('tbl_products', 'tbl_details_order.id_product', '=', 'tbl_products.id') 
            -> where('order_code', $order['order_code']) -> get() -> toArray();
            array_push($detailsOrder, $products);
        }
        return View::make('clients.layouts.profile.ordered', compact([
            'category_product', 'ordered', 'detailsOrder'
        ]));
    }

    public function viewUserFbOrdered($id) {
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        $ordered = Orders::where('id_user', $id) -> orderBy('tbl_orders.created_at', 'desc') -> get() -> toArray();
        $detailsOrder = [];
        foreach($ordered as $key => $order) {
            $products = DetailsOrder::join('tbl_products', 'tbl_details_order.id_product', '=', 'tbl_products.id') 
            -> where('order_code', $order['order_code']) -> get() -> toArray();
            array_push($detailsOrder, $products);
        }
        return View::make('clients.layouts.profile.ordered', compact([
            'category_product', 'ordered', 'detailsOrder'
        ]));
    }

    public function insertOrder(Request $request) {
        if($request->ajax()){
            $data =  $request->all();
            $user = array_pop($data);
            $order_code = $this -> randomCode();
            $resultOrders = Orders::insert([
                'order_code' => $order_code,
                'id_user' => Session::get('id'),
                'fullname' => $user['username'],
                'number_phone' => $user['number_phone'],
                'address' => $user['address'],
                'payment_method' => $user['payment_method'],
                'total_money' => $user['total_money'] * 1000,
                'state' => "Chờ xử lý",
                'note' => $user['note'] ? $user['note'] : "",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            foreach($data as $key => $value) {
                $resultDOrder = DetailsOrder::insert([
                    'order_code' =>  $order_code,
                    'id_product' => $value['id'],
                    'name' => $value['name'],
                    'unit_of_measure' => 'kg',
                    'quantity' =>  $value['quantity'],
                    'price' => $value['price'],
                    'discount' => $value['discount'],
                    'into_money' =>  $value['quantity'] * floor(((int)$value['price'] / 1000) * (1 - ((int)$value['discount']) / 100)) * 1000,
                    'id_category_product' => $value['id_category_product'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
            $recipient = Users::find(Session::get('id'));
            $isMailer = Mail::to($recipient -> email) -> queue(new OrderMail($recipient));
            if($resultOrders && $resultDOrder) {
                Session::flash('orderSuccess', true);
                $url = '/user/ordered/' . Session::get('id');
                return Response::json($url);
            } else {
                Session::flash('orderFailed', false);
                $url = '/user/ordered/' . Session::get('id');
                return Response::json($url);
            } 
        }
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
