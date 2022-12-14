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

}
