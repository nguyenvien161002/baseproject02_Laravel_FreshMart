<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\CategoryProduct;

class IntroductionController extends Controller
{
    public function index()
    {
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        return View::make('clients.layouts.introduction', compact([
            'category_product'
        ]));
    }
}
