<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use App\Models\DetailsOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Request;


class A_OrdersController extends Controller
{
    public function index() {
        // Autocomplete search
        if(Request::has('queryAutocomplete')) {
            $resutl = "";
            $query = Request::get('queryAutocomplete');
            $httpHost = Request::getSchemeAndHttpHost();
            $orders = Orders::select('fullname') -> search($query) -> get() -> toArray();
            foreach ($orders as $key => $value) { 
                $resutl .= "<div href='' class='result-search d-flex align-items-center' data-name='{$value['fullname']}'>
                                <img src='{$httpHost}/images/svg/search2.svg' alt=''>
                                <p class='title-result' title='{$value['fullname']}'>{$value['fullname']}</p>
                            </div>";
            }
            return $resutl;
        }
        // Not autocomplete search
        if(Request::has('review') && !Request::has('sortby') && !Request::has('amount') && !Request::has('search')) {
            $state = Request::get('review') == "approved" ? "Đã duyệt" : "Chờ xử lý"; 
            $orders = Orders::orderBy('created_at', 'desc') -> where('state', $state) -> paginate(5);
        } elseif (Request::has('sortby') && !Request::has('amount') && !Request::has('search') && !Request::has('review')) {
            $sortby = Request::get('sortby');
            $type = Request::get('type');
            $orders = Orders::orderBy("$sortby", "$type")  -> paginate(5);
        } elseif (!Request::has('sortby') && Request::has('amount') && !Request::has('search') && !Request::has('review')) {
            $orders = Orders::orderBy('created_at', 'desc')  -> paginate(Request::get('amount'));
        } elseif (Request::has('sortby') && Request::has('amount') && !Request::has('search') && !Request::has('review')) {
            $sortby = Request::get('sortby');
            $type = Request::get('type');
            $amount = Request::get('amount');
            $orders = Orders::orderBy("$sortby", "$type") -> paginate($amount);
        } elseif (!Request::has('sortby') && !Request::has('amount') && Request::has('search') && !Request::has('review')) {
            $search = Request::get('search');
            $orders = Orders::orderBy("created_at", "desc") -> search($search) -> paginate(5);
        } elseif (!Request::has('sortby') && Request::has('amount') && Request::has('search') && !Request::has('review')) {
            $amount = Request::get('amount');
            $search = Request::get('search');
            $orders = Orders::orderBy("created_at", "desc") -> search($search) -> paginate($amount);
        } elseif (Request::has('sortby') && !Request::has('amount') && !Request::has('search') && !Request::has('review')) {
            $sortby = Request::get('sortby');
            $type = Request::get('type');
            $search = Request::get('search');
            $orders = Orders::orderBy("$sortby", "$type") -> search($search) -> paginate(5);
        } elseif (Request::has('sortby') && Request::has('amount') && !Request::has('search') && !Request::has('review')) {
            $sortby = Request::get('sortby');
            $type = Request::get('type');
            $amount = Request::get('amount');
            $search = Request::get('search');
            $orders = Orders::orderBy("$sortby", "$type") -> search($search) -> paginate($amount);
        } elseif (Request::has('sortby') && !Request::has('amount') && Request::has('search') && !Request::has('review')) {
            $sortby = Request::get('sortby');
            $type = Request::get('type');
            $search = Request::get('search');
            $orders = Orders::orderBy("$sortby", "$type") -> search($search) -> paginate(5);
        } elseif (Request::has('sortby') && Request::has('amount') && Request::has('search') && !Request::has('review')) {
            $sortby = Request::get('sortby');
            $type = Request::get('type');
            $amount = Request::get('amount');
            $search = Request::get('search');
            $orders = Orders::orderBy("$sortby", "$type") -> search($search) -> paginate($amount);
        } elseif (!Request::has('sortby') && Request::has('amount') && Request::has('search') && Request::has('review')) {
            $amount = Request::get('amount');
            $search = Request::get('search');
            $state = Request::get('review') == "approved" ? "Đã duyệt" : "Chờ xử lý"; 
            $orders = Orders::orderBy('created_at', 'desc') -> where('state', $state) -> search($search) -> paginate($amount);
        } elseif (!Request::has('sortby') && !Request::has('amount') && Request::has('search') && Request::has('review')) {
            $search = Request::get('search');
            $state = Request::get('review') == "approved" ? "Đã duyệt" : "Chờ xử lý"; 
            $orders = Orders::orderBy('created_at', 'desc') -> where('state', $state) -> search($search) -> paginate(5);
        } elseif (!Request::has('sortby') && Request::has('amount') && !Request::has('search') && Request::has('review')) {
            $amount = Request::get('amount');
            $state = Request::get('review') == "approved" ? "Đã duyệt" : "Chờ xử lý"; 
            $orders = Orders::orderBy('created_at', 'desc') -> where('state', $state) -> paginate($amount);
        } elseif (Request::has('sortby') && !Request::has('amount') && !Request::has('search') && Request::has('review')) {
            $sortby = Request::get('sortby');
            $type = Request::get('type');
            $state = Request::get('review') == "approved" ? "Đã duyệt" : "Chờ xử lý"; 
            $orders = Orders::orderBy("$sortby", "$type") -> where('state', $state) -> paginate(5);
        } elseif (Request::has('sortby') && Request::has('amount') && !Request::has('search') && Request::has('review')) {
            $sortby = Request::get('sortby');
            $type = Request::get('type');
            $amount = Request::get('amount');
            $state = Request::get('review') == "approved" ? "Đã duyệt" : "Chờ xử lý"; 
            $orders = Orders::orderBy("$sortby", "$type") -> where('state', $state) -> paginate($amount);
        } elseif (Request::has('sortby') && !Request::has('amount') && Request::has('search') && Request::has('review')) {
            $sortby = Request::get('sortby');
            $type = Request::get('type');
            $search = Request::get('search');
            $state = Request::get('review') == "approved" ? "Đã duyệt" : "Chờ xử lý"; 
            $orders = Orders::orderBy("$sortby", "$type") -> where('state', $state) -> search($search) -> paginate(5);
        } elseif (Request::has('sortby') && Request::has('amount') && Request::has('search') && Request::has('review')) {
            $sortby = Request::get('sortby');
            $type = Request::get('type');
            $amount = Request::get('amount');
            $search = Request::get('search');
            $state = Request::get('review') == "approved" ? "Đã duyệt" : "Chờ xử lý"; 
            $orders = Orders::orderBy("$sortby", "$type") -> where('state', $state) -> search($search) -> paginate($amount);
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
