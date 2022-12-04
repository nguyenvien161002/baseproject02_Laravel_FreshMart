<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Products;
use App\Models\CategoryProduct;
use App\Models\Orders;
use App\Models\DetailsOrder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Request;


class A_OrdersController extends Controller
{
    public function index() {
        if(Request::has('query') && Request::get('query') == 'review') {
            $state = Request::get('query') == "approved" ? "Đã duyệt" : "Chờ xử lý"; 
            $orders = Orders::where('state', $state) -> paginate(5);
        } elseif (Request::has('sortby') && !Request::has('amount')) {
            $sortby = Request::get('sortby');
            $type = Request::get('type');
            $orders = Orders::orderBy("$sortby", "$type")  -> paginate(5);
        } elseif (!Request::has('sortby') && Request::has('amount')) {
            $orders = Orders::orderBy('created_at', 'desc')  -> paginate(Request::get('amount'));
        } elseif (Request::has('sortby') && Request::has('amount')) {
            $sortby = Request::get('sortby');
            $type = Request::get('type');
            $amount = Request::get('amount');
            $orders = Orders::orderBy("$sortby", "$type") -> paginate($amount);
        } else {
            $orders = Orders::orderBy('created_at', 'desc') -> paginate(5);
        }
        return View::make('admin.layouts.orders.list_order', compact('orders'));
    }

    public function updateOrder()
    {
        if(Request::ajax()){
            $data = Request::all();
            $result = Orders::where('order_code', $data['order_code']) -> update([
                'state' => $data['approved']
            ]);
            if($result) {
                Session::flash('success', "Duyệt đơn hàng thành công!");
                $url = '/admin/orders';
                return Response::json($url);
            } else {
                Session::flash('failed', "Duyệt đơn hàng thất bại!");
                $url = '/admin/orders';
                return Response::json($url);
            } 
        }
    }

    public function deleteOrder($order_code)
    {
        $result = Orders::where('order_code', $order_code) -> delete();
        if($result) {
            Session::flash('success', "Xóa đơn hàng thành công!");
            return Redirect::route('admin.orders');
        } else {
            Session::flash('failed', "Xóa đơn hàng thất bại!");
            return Redirect::route('admin.orders');
        }
    }

    public function viewDetailsOrder($order_code)
    {
        $orders = Orders::where('order_code', $order_code) -> get() -> toArray();
        $totalOrders = Orders::count();
        $details_order = DetailsOrder::where('order_code', $order_code) -> get() -> toArray();
        return View::make('admin.layouts.orders.details_order', compact([
            'orders', 'details_order', 'totalOrders'
        ]));
    }
 
}
