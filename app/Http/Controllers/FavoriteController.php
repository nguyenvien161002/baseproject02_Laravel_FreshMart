<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\CategoryProduct;

class FavoriteController extends Controller
{
    public function index() {
        $category_product = CategoryProduct::all() -> toArray();
        return View::make('clients.layouts.favorite', compact([
            'category_product'
        ]));
    }
}
