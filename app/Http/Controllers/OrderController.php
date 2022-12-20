<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\CategoryProduct;
use App\Models\Orders;
use App\Models\DetailsOrder;
use App\Models\AddressUser;

class OrderController extends Controller
{
    public function index($id_user) {
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        $address_user = AddressUser::where('id_user', $id_user) -> where('state', 1) -> get() -> toArray();
        if($address_user) {
            $address_components = explode("|", $address_user[0]['address_default']);
            return View::make('clients.layouts.order', compact([
                'category_product', 'address_components', 'address_user'
            ]));
        } else {
            return View::make('clients.layouts.order', compact('category_product'));
        }
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
