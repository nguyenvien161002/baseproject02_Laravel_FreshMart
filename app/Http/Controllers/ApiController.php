<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ApiController extends Controller
{
    public function index()
    {
        $allProduct = Products::all();
        return $allProduct;
    }
}
