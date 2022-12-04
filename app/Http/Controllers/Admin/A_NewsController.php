<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\News;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

class A_NewsController extends Controller
{
    public function index(Request $request)
    {
        if($request -> sortby && !$request -> amount) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $allNews = News::orderBy("$sortby", "$type")  -> paginate(5);
        } elseif (!$request -> sortby && $request -> amount) {
            $allNews = News::orderBy("id", "desc")  -> paginate($request -> amount);
        } elseif ($request -> sortby && $request -> amount) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $amount = $request -> amount;
            $allNews = News::orderBy("$sortby", "$type")  -> paginate($amount);
        } else {
            $allNews = News::orderBy("id", "desc") -> paginate(5);
        }
        return View::make('admin.layouts.news.list_news' , compact('allNews'));
    }

    public function viewAddNews()
    {
        return View::make('admin.layouts.news.add_news');
    }

    public function insertNews(Request $request)
    {
        $title = $request -> title_news;
        $content = $request -> content_news;
        $image = $request -> image_news;
        $imageName = $image -> getClientOriginalName();
        $author = $request -> author_news;
        $state = $request -> state_news;
        $uploadImg = $image -> move(public_path('images\news'), $imageName);
        $result = News::insert([
            'title' => $title,
            'content' => $content,
            'image' => $imageName,
            'author' => $author,
            'state' => $state,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        if($result && $uploadImg) {
            Session::flash('success', "Thêm tin tức thành công!");
            return Redirect::route('admin.news');
        } else {
            Session::flash('failed', "Thêm tin tức thất bại!");
            return Redirect::route('admin.news');
        }
    }

    public function viewEditNews($id)
    {
        $news = News::find($id) -> getOriginal();
        return View::make('admin.layouts.news.edit_news', compact('news'));
    }

    public function updateNews(Request $request)
    {
        $id = $request -> id_news;
        $news = News::find($id) -> toArray();
        $rsRemoveImg = false;
        if($news['image']) {
            if(File::exists('images/news/' . $news['image'])) {
                $rsRemoveImg = File::delete(('images/news/' . $news['image']));
            }
        }
        $title = $request -> title_news;
        $content = $request -> content_news;
        $image = $request -> image_news;
        $imageName = $image -> getClientOriginalName();
        $author = $request -> author_news;
        $state = $request -> state_news;
        $uploadImg = $image -> move(public_path('images\news'), $imageName);
        $result = News::where('id', $id) -> update([
            'title' => $title,
            'content' => $content,
            'image' => $imageName,
            'author' => $author,
            'state' => $state,
            'updated_at' => Carbon::now()
        ]);
        if($result && $rsRemoveImg && $uploadImg) {
            Session::flash('success', "Sửa tin tức thành công!");
            return Redirect::route('admin.news');
        } else {
            Session::flash('failed', "Sửa tin tức thất bại!");
            return Redirect::route('admin.news');
        }
    }

    public function deleteNews($id)
    {
        $news = News::find($id) -> toArray();
        $rsRemoveImg = false;
        if($news['image']) {
            if(File::exists('images/news/' . $news['image'])) {
                $rsRemoveImg = File::delete(('images/news/' . $news['image']));
            }
        }
        $result = News::where('id', $id) -> delete();
        if($result && $rsRemoveImg) {
            Session::flash('success', "Xóa tin tức thành công!");
            return Redirect::route('admin.news');
        } else {
            Session::flash('failed', "Xóa tin tức thất bại!");
            return Redirect::route('admin.news');
        }
    }

    public function viewDetailsNews($id)
    {
        $news = News::find($id) -> getOriginal();
        $totalNews = News::count();
        return View::make('admin.layouts.news.details_news', compact('news', 'totalNews'));
    }
}