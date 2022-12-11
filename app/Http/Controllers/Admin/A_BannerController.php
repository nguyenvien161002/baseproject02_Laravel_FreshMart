<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class A_BannerController extends Controller
{
    public function index(Request $request)
    {
        // Autocomplete search
        if($request -> queryAutocomplete) {
            $resutl = "";
            $query =  $request -> queryAutocomplete;
            $banner = Banner::select('name') -> search($query) -> get() -> toArray();
            foreach ($banner as $key => $value) { 
                $resutl .= "<div href='' class='result-search d-flex align-items-center' data-name='{$value['name']}'>
                                <img src='{$request -> getSchemeAndHttpHost()}/images/svg/search2.svg' alt=''>
                                <p class='title-result' title='{$value['name']}'>{$value['name']}</p>
                            </div>";
            }
            return $resutl;
        }
        // Not autocomplete search
        if($request -> sortby && !$request -> amount && !$request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $banner = Banner::orderBy("$sortby", "$type") -> paginate(5);
        } elseif (!$request -> sortby && $request -> amount && !$request -> search) {
            $banner = Banner::orderBy('id', 'desc') -> paginate($request -> amount);
        } elseif ($request -> sortby && $request -> amount && !$request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $amount = $request -> amount;
            $banner = Banner::orderBy("$sortby", "$type")  -> paginate($amount);
        }elseif (!$request -> sortby && !$request -> amount && $request -> search) {
            $search = $request -> search;
            $banner = Banner::orderBy("id", "desc") -> search($search) -> paginate(5);
        } elseif (!$request -> sortby && $request -> amount && $request -> search) {
            $amount = $request -> amount;
            $search = $request -> search;
            $banner = Banner::orderBy("id", "desc") -> search($search) -> paginate($amount);
        } elseif ($request -> sortby && !$request -> amount && $request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $search = $request -> search;
            $banner = Banner::orderBy("$sortby", "$type") -> search($search) -> paginate(5);
        } elseif ($request -> sortby && $request -> amount && $request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $amount = $request -> amount;
            $search = $request -> search;
            $banner = Banner::orderBy("$sortby", "$type") -> search($search) -> paginate($amount);
        } else {
            $banner = Banner::orderBy('id', 'desc') -> paginate(5);
        }
        return View::make('admin.layouts.banner.list_banner', compact('banner'));
    }

    public function viewAddBanner()
    {
        return View::make('admin.layouts.banner.add_banner');
    }

    public function insertBanner(Request $request)
    {
        $name = $request -> name_banner;
        $image = $request -> image_banner;
        $state = $request -> state_banner;
        $imageName = $image -> getClientOriginalName();
        $uploadImage = $image -> move(public_path('images/banner'), $imageName);
        $result = Banner::insert([
            'name' => $name,
            'image' => $imageName,
            'state' => $state,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        if ($result && $uploadImage) {
            Session::flash('success', "Thêm banner thành công!");
            return Redirect::route('admin.banner');
        } else {
            Session::flash('failed', "Thêm banner thất bại!");
            return Redirect::route('admin.banner');
        }
    }

    public function viewEditBanner($id)
    {
        $banner = Banner::find($id) -> getOriginal();
        return View::make('admin.layouts.banner.edit_banner', compact('banner'));
    }

    public function updateBanner(Request $request)
    {
        $id = $request -> id_banner;
        $name = $request -> name_banner;
        $image = $request -> image_banner;
        $state = $request -> state_banner;
        $banner = Banner::find($id);
        $rsRemoveImg = false;
        if($banner['image']) {
            if(File::exists('images/banner/' . $banner['image'])) {
                $rsRemoveImg = File::delete('images/banner/' . $banner['image']);
            }
        }
        $imageName = $image -> getClientOriginalName();
        $uploadImage = $image -> move(public_path('images/banner'), $imageName);
        $result = Banner::where('id', $id) -> update([
            'name' => $name,
            'image' => $imageName,
            'state' => $state,
            'updated_at' => Carbon::now()
        ]);
        if($result && $rsRemoveImg && $uploadImage) {
            Session::flash('success', "Sửa thông tin banner thành công!");
            return Redirect::route('admin.banner');
        } else {
            Session::flash('failed', "Sửa thông tin banner thất bại!");
            return Redirect::route('admin.banner');
        }
    }

    public function deleteBanner($id)
    {
        $banner = Banner::find($id) -> toArray();
        $rsRemoveImg = false;
        if(File::exists('images/banner/' . $banner['image'])) {
            $rsRemoveImg = File::delete('images/banner/' . $banner['image']);
        }
        $result = Banner::where('id', $id) -> delete();
        if($result && $rsRemoveImg) {
            Session::flash('success', "Xóa banner thành công!");
            return Redirect::route('admin.banner');
        } else {
            Session::flash('failed', "Xóa banner thất bại!");
            return Redirect::route('admin.banner');
        }
    }

    public function viewDetailsBanner($id)
    {
        $banner = Banner::find($id) -> getOriginal();
        $totalBanner = Banner::count();
        return View::make('admin.layouts.banner.details_banner', compact('banner', 'totalBanner'));
    }

    public function updateStateBanner(Request $request) {
        $id = $request-> id;
        $state = $request -> state == 'public' ? '1' : '0';
        $result = Banner::where('id', $id) -> update([
            'state' => $state,
            'updated_at' => Carbon::now()
        ]);
        if($result) {
            Session::flash('success', "Cập nhật trạng thái banner thành công!");
            return Redirect::route('admin.banner');
        } else {
            Session::flash('failed', "Cập nhật trạng thái banner thất bại!");
            return Redirect::route('admin.banner');
        }
    }
}
