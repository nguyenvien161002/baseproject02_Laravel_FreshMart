<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\CategoryProduct;
use App\Models\News;
use Illuminate\Support\Carbon;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('updated_at', 'desc') -> where('state', 1) -> get() -> toArray();
        $updated_at = [];
        foreach($news as $k => $v) {
            $at = Carbon::parse($v['updated_at']) -> format('d/m/Y');
            array_push($updated_at, $at);
        }
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        return View::make('clients.layouts.news', compact([
            'news', 'updated_at', 'category_product'
        ]));
    }

    public function detailsNews($id)
    {
        $news = News::orderBy('updated_at', 'desc') -> where('state', 1) -> get() -> toArray();
        $newsById = News::find($id) -> toArray();
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        return View::make('clients.layouts.details.details_news', compact([
            'news', 'category_product', 'newsById'
        ]));
    }
}
