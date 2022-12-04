<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\CategoryProduct;
use App\Models\Products;
use App\Models\Users;
use App\Models\UsersGG;

class ProfileController extends Controller
{
    public function index($id)
    {
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        $user = Users::where('id', $id) -> get() -> toArray();
        return View::make('clients.layouts.profile.profile', compact([
            'category_product', 'user'
        ]));
    }
}
