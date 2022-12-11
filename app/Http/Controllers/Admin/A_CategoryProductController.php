<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\CategoryProduct;

class A_CategoryProductController extends Controller
{
    public function index(Request $request)
    {
         // Autocomplete search
         if($request -> queryAutocomplete) {
            $resutl = "";
            $query =  $request -> queryAutocomplete;
            $allCategoryProduct = CategoryProduct::select('name') -> search($query) -> get() -> toArray();
            foreach ($allCategoryProduct as $key => $value) { 
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
            $allCategoryProduct = CategoryProduct::orderBy("$sortby", "$type")  -> paginate(10);
        } elseif (!$request -> sortby && $request -> amount && !$request -> search) {
            $allCategoryProduct = CategoryProduct::orderBy("id", "desc") -> paginate($request -> amount);
        } elseif ($request -> sortby && $request -> amount && !$request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $amount = $request -> amount;
            $allCategoryProduct = CategoryProduct::orderBy("$sortby", "$type")  -> paginate($amount);
        } elseif (!$request -> sortby && !$request -> amount && $request -> search) {
            $search = $request -> search;
            $allCategoryProduct = CategoryProduct::orderBy("id", "desc") -> search($search) -> paginate(10);
        } elseif (!$request -> sortby && $request -> amount && $request -> search) {
            $amount = $request -> amount;
            $search = $request -> search;
            $produallCategoryProductcts = CategoryProduct::orderBy("id", "desc") -> search($search) -> paginate($amount);
        } elseif ($request -> sortby && !$request -> amount && $request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $search = $request -> search;
            $allCategoryProduct = CategoryProduct::orderBy("$sortby", "$type") -> search($search) -> paginate(10);
        } elseif ($request -> sortby && $request -> amount && $request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $amount = $request -> amount;
            $search = $request -> search;
            $allCategoryProduct = CategoryProduct::orderBy("$sortby", "$type") -> search($search) -> paginate($amount);
        } else {
            $allCategoryProduct = CategoryProduct::orderBy("id", "desc") -> paginate(10);
        }
        return View::make('admin.layouts.category_product.list_category_product', compact('allCategoryProduct'));
    }

    public function viewAddCategoryProduct()
    {
        return View::make('admin.layouts.category_product.add_category_product');
    }

    public function insertCategoryProduct(Request $request)
    {
        $name = $request -> name_category;
        $description = $request -> description_category;
        $state = $request -> state_category;
        $result = CategoryProduct::insert([
            'name' => $name,
            'description' => $description,
            'state' => $state,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        if($result) {
            Session::flash('success', "Thêm danh mục sản phẩm thành công!");
            return Redirect::route('admin.category_product');
        } else {
            Session::flash('failed', "Thêm danh mục sản phẩm thất bại!");
            return Redirect::route('admin.category_product');
        }
    }

    public function viewEditCategoryProduct($id)
    {
        $category_product = CategoryProduct::find($id) -> getOriginal();
        return View::make('admin.layouts.category_product.edit_category_product', compact('category_product'));
    }

    public function updateCategoryProduct(Request $request)
    {
        $id = $request -> id_category;
        $name = $request -> name_category;
        $description = $request -> description_category;
        $state = $request -> state_category;
        $result = CategoryProduct::where('id', $id) -> update([
            'name' => $name,
            'description' => $description,
            'state' => $state,
            'updated_at' => Carbon::now()
        ]);
        if($result) {
            Session::flash('success', "Sửa danh mục sản phẩm thành công!");
            return Redirect::route('admin.category_product');
        } else {
            Session::flash('failed', "Sửa danh mục sản phẩm thất bại!");
            return Redirect::route('admin.category_product');
        }
    }

    public function deleteCategoryProduct($id)
    {
        $result = CategoryProduct::where('id', $id) -> delete();
        if($result) {
            Session::flash('success', "Xóa danh mục sản phẩm thành công!");
            return Redirect::route('admin.category_product');
        } else {
            Session::flash('failed', "Xóa danh mục sản phẩm thất bại!");
            return Redirect::route('admin.category_product');
        }
    }

    public function viewDetailsCategoryProduct($id)
    {
        $category_product = CategoryProduct::find($id) -> getOriginal();
        $totalCategoryProduct = CategoryProduct::count();
        return View::make('admin.layouts.category_product.details_category_product', compact('category_product', 'totalCategoryProduct'));
    }

    public function updateStateCategoryProduct(Request $request) {
        $id = $request-> id;
        $state = $request -> state == 'public' ? '1' : '0';
        $result = CategoryProduct::where('id', $id) -> update([
            'state' => $state,
            'updated_at' => Carbon::now()
        ]);
        if($result) {
            Session::flash('success', "Cập nhật trạng thái danh mục sản phẩm thành công!");
            return Redirect::route('admin.category_product');
        } else {
            Session::flash('failed', "Cập nhật trạng thái danh mục sản phẩm thất bại!");
            return Redirect::route('admin.category_product');
        }
    }
}