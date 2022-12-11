<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class A_NewsController extends Controller
{
    public function index(Request $request)
    {
        // Autocomplete search
        if($request -> queryAutocomplete) {
            $resutl = "";
            $query =  $request -> queryAutocomplete;
            $allNews = News::select('title') -> search($query) -> get() -> toArray();
            foreach ($allNews as $key => $value) { 
                $resutl .= "<div href='' class='result-search d-flex align-items-center' data-name='{$value['title']}'>
                                <img src='{$request -> getSchemeAndHttpHost()}/images/svg/search2.svg' alt=''>
                                <p class='title-result' title='{$value['title']}'>{$value['title']}</p>
                            </div>";
            }
            return $resutl;
        }
        // Not autocomplete search
        if($request -> sortby && !$request -> amount && !$request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $allNews = News::orderBy("$sortby", "$type")  -> paginate(5);
        } elseif (!$request -> sortby && $request -> amount && !$request -> search) {
            $allNews = News::orderBy("id", "desc")  -> paginate($request -> amount);
        } elseif ($request -> sortby && $request -> amount && !$request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $amount = $request -> amount;
            $allNews = News::orderBy("$sortby", "$type")  -> paginate($amount);
        } elseif (!$request -> sortby && !$request -> amount && $request -> search) {
            $search = $request -> search;
            $allNews = News::orderBy("id", "desc") -> search($search) -> paginate(5);
        } elseif (!$request -> sortby && $request -> amount && $request -> search) {
            $amount = $request -> amount;
            $search = $request -> search;
            $allNews = News::orderBy("id", "desc") -> search($search) -> paginate($amount);
        } elseif ($request -> sortby && !$request -> amount && $request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $search = $request -> search;
            $allNews = News::orderBy("$sortby", "$type") -> search($search) -> paginate(5);
        } elseif ($request -> sortby && $request -> amount && $request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $amount = $request -> amount;
            $search = $request -> search;
            $allNews = News::orderBy("$sortby", "$type") -> search($search) -> paginate($amount);
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

    public function updateStateNews(Request $request) {
        $id = $request-> id;
        $state = $request -> state == 'public' ? '1' : '0';
        $result = News::where('id', $id) -> update([
            'state' => $state,
            'updated_at' => Carbon::now()
        ]);
        if($result) {
            Session::flash('success', "Cập nhật trạng thái tin tức thành công!");
            return Redirect::route('admin.news');
        } else {
            Session::flash('failed', "Cập nhật trạng thái tin tức thất bại!");
            return Redirect::route('admin.news');
        }
    }
}