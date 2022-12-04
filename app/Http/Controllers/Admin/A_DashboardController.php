<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Staffs;
use App\Models\News;
use App\Models\Products;
use App\Models\Orders;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class A_DashboardController extends Controller
{
    public function index()
    {
        $totalNews = News::count();
        $totalCustomer = Users::where('id_authorization', 3)
            -> orWhere('id_authorization', 4)
            -> orWhere('id_authorization', 5) -> count();
        $totalStaff = Staffs::where('id_authorization', 2) -> count();
        $totalProduct = Products::count();
        $totalOrder = Orders::count();
        $totalOUnapp = Orders::where('state', 'Chờ xử lý') -> count();
        $revenue = [];
        $revenue['monthly'] = Orders::whereYear('created_at', date('Y')) 
        -> whereMonth('created_at', date('m')) -> sum('total_money');
        $revenue['yearly'] = Orders::whereYear('created_at', date('Y')) -> sum('total_money');
        return View::make("admin.layouts.dashboard", compact([
            'totalProduct', 'totalNews', 'totalOrder', 'totalCustomer', 'totalStaff', 'totalOUnapp', 'revenue'
        ]));
    }
}
