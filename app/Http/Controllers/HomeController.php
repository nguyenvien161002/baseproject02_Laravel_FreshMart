<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Products;
use App\Models\Banner;
use App\Models\News;
use App\Models\CategoryProduct;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::select('image') -> where('state', 1) -> get() -> toArray();
        $promotional_p = Products::where([
            ['discount', '>=', 20],
            ['state', '=', 1]
        ]) -> limit(5) -> get() -> toArray();
        $promotional_f = Products::where([
            ['discount', '>=', 20],
            ['id_category_product', '=', 1],
            ['state', '=', 1]  
        ]) -> inRandomOrder() -> limit(4) -> get() -> toArray();
        $vegetables = Products::where([
            ['id_category_product', '=', 2],
            ['state', '=', 1]   
        ]) -> limit(4) -> get() -> toArray();
        $meat = Products::where([
            ['id_category_product', '=', 4],
            ['state', '=', 1]    
        ]) -> limit(4) -> get() -> toArray();
        $news = News::where('state', 1) -> get() -> toArray();
        $updated_at = [];
        foreach($news as $k => $v) {
            $at = Carbon::parse($v['updated_at']) -> format('d/m/Y');
            array_push($updated_at, $at);
        }
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        return View::make('clients.layouts.home', compact([
            'banner', 'promotional_p', 'promotional_f', 'vegetables', 'meat', 'news', 'updated_at', 'category_product'
        ]));
    }
}
