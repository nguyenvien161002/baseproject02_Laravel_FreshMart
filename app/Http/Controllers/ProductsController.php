<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            if($request -> sort_by == 'alpha-asc') {
                $products = Products::where('state', 1) -> orderBy('name', 'asc') -> paginate(12);
            } elseif ($request -> sort_by == 'alpha-desc') {
                $products = Products::where('state', 1) -> orderBy('name', 'desc') -> paginate(12);
            } elseif ($request -> sort_by == 'price-asc') {
                $products = Products::where('state', 1) -> orderBy('price', 'asc') -> paginate(12);
            } elseif ($request -> sort_by == 'price-desc') {
                $products = Products::where('state', 1) -> orderBy('price', 'desc') -> paginate(12);
            } else {
                $products = Products::where('state', 1) -> paginate(12);
            }
            return View::make('clients.layouts.products.main', compact([
                'products'
            ]));
        }
        if($request -> sort_by == 'alpha-asc') {
            $products = Products::where('state', 1) -> orderBy('name', 'asc') -> paginate(12);
        } elseif ($request -> sort_by == 'alpha-desc') {
            $products = Products::where('state', 1) -> orderBy('name', 'desc') -> paginate(12);
        } elseif ($request -> sort_by == 'price-asc') {
            $products = Products::where('state', 1) -> orderBy('price', 'asc') -> paginate(12);
        } elseif ($request -> sort_by == 'price-desc') {
            $products = Products::where('state', 1) -> orderBy('price', 'desc') -> paginate(12);
        } else {
            $products = Products::where('state', 1) -> paginate(12);
        }
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        return View::make('clients.layouts.products', compact([
            'category_product', 'products'
        ]));
    }

    public function detailsProduct($id)
    {
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        $product = Products::find($id) -> toArray();
        $related_p = Products::where([
            ['id_category_product', '=', $product['id_category_product']],            
            ['id', '<>', $id],            
            ['discount', '>', 0]            
        ])
        -> inRandomOrder() -> limit(5) -> get() -> toArray();
        $images_sub = explode('|', $product['images_sub']);
        return View::make('clients.layouts.details.details_product', compact([
            'category_product', 'product', 'related_p', 'images_sub'
        ]));
    }


    public function getProductsFromCondi(Request $request)
    {
        if($request -> ajax()) {
            $url = $request -> url;
            $url_components = parse_url($url);
            parse_str($url_components['query'], $params);
            if(isset($params['sort_by']) && $params['sort_by'] == 'alpha-asc') {
                $products = Products::where('state', 1) -> orderBy('name', 'asc') -> paginate(12);
            } elseif (isset($params['sort_by']) && $params['sort_by'] == 'alpha-desc') {
                $products = Products::where('state', 1) -> orderBy('name', 'desc') -> paginate(12);
            } elseif (isset($params['sort_by']) && $params['sort_by'] == 'price-asc') {
                $products = Products::where('state', 1) -> orderBy('price', 'asc') -> paginate(12);
            } elseif (isset($params['sort_by']) && $params['sort_by'] == 'price-desc') {
                $products = Products::where('state', 1) -> orderBy('price', 'desc') -> paginate(12);
            } else {
                $products = Products::where('state', 1) -> paginate(12);
            }
            return Response::json(View::make('clients.layouts.products.main', compact('products')) -> render(), 200);
        }
    }

    // public function getMoreProducts(Request $request)
    // {
    //     if($request -> ajax()) {
    //         // dd($request->all());
    //         if($request -> sort_by == 'alpha-asc' && $request -> page) {
    //             $products = Products::where('state', 1) -> orderBy('name', 'asc') -> paginate(12);
    //         } elseif ($request -> sort_by == 'price-asc' && $request -> page) {
    //             $products = Products::where('state', 1) -> orderBy('price', 'asc') -> paginate(12);
    //         } elseif ($request -> sort_by == 'price-desc' && $request -> page) {
    //             $products = Products::where('state', 1) -> orderBy('price', 'desc') -> paginate(12);
    //         } elseif ($request -> sort_by == 1 && $request -> page) {
    //             $products = Products::where('state', 1) 
    //             -> where('price', '<', 100000) -> paginate(12);
    //         } else {
    //             $products = Products::where('state', 1) -> paginate(12);
    //         };
    //         return View::make('clients.layouts.products.main', compact('products')) -> render();
    //     }
    // }

    public function getProductOfCategory($id)
    {
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        $products = Products::where('state', 1) -> where('id_category_product', $id) -> paginate(12);
        return View::make('clients.layouts.products', compact([
            'category_product', 'products'
        ]));
    }

}
