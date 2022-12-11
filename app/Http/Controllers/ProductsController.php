<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\CategoryProduct;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index()
    {
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        $products = Products::where('state', 1) -> paginate(12);
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
}
