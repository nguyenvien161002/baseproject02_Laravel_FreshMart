<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use App\Models\CategoryProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class A_ProductsController extends Controller
{
    public function index(Request $request)
    {
        // Autocomplete search
        if($request -> queryAutocomplete) {
            $result = "";
            $query =  $request -> queryAutocomplete;
            $products = Products::select('name') -> search($query) -> get() -> toArray();
            foreach ($products as $key => $value) { 
                $result .= "<div href='' class='result-search d-flex align-items-center' data-name='{$value['name']}'>
                                <img src='{$request -> getSchemeAndHttpHost()}/images/svg/search2.svg' alt=''>
                                <p class='title-result' title='{$value['name']}'>{$value['name']}</p>
                            </div>";
            }
            return $result;
        }
        // Not autocomplete search
        if($request -> sortby && !$request -> amount && !$request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $products = Products::orderBy("$sortby", "$type")  -> paginate(10);
        } elseif (!$request -> sortby && $request -> amount && !$request -> search) {
            $products = Products::orderBy("id", "desc")  -> paginate($request -> amount);
        } elseif ($request -> sortby && $request -> amount && !$request ->search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $amount = $request -> amount;
            $products = Products::orderBy("$sortby", "$type")  -> paginate($amount);
        } elseif (!$request -> sortby && !$request -> amount && $request -> search) {
            $search = $request -> search;
            $products = Products::orderBy("id", "desc") -> search($search) -> paginate(10);
        } elseif (!$request -> sortby && $request -> amount && $request -> search) {
            $amount = $request -> amount;
            $search = $request -> search;
            $products = Products::orderBy("id", "desc") -> search($search) -> paginate($amount);
        } elseif ($request -> sortby && !$request -> amount && $request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $search = $request -> search;
            $products = Products::orderBy("$sortby", "$type") -> search($search) -> paginate(10);
        } elseif ($request -> sortby && $request -> amount && $request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $amount = $request -> amount;
            $search = $request -> search;
            $products = Products::orderBy("$sortby", "$type") -> search($search) -> paginate($amount);
        }  else {
            $products = Products::orderBy("id", "desc") -> paginate(10);
        }
        return View::make('admin.layouts.products.list_product', compact('products'));
    }

    public function viewAddProduct()
    {
        $categoryProduct = CategoryProduct::select('id', 'name') -> get() -> toArray();
        return View::make('admin.layouts.products.add_product', compact('categoryProduct'));
    }

    public function insertProduct(Request $request)
    {
        $name = $request -> name_product;
        $price = $request -> price_product;
        $discount = $request -> discount_product;
        $description = $request -> desc_product;
        $details = $request -> details_product;
        $state = $request -> state_product;
        $id_category_product = $request -> category_product;
        if($id_category_product == 1) {
            $pathUpload = 'images\fruits';
            $pathSave = 'fruits/';
        } else if ($id_category_product == 2) {
            $pathUpload = 'images\vegetables';
            $pathSave = 'vegetables/';
        } else if ($id_category_product == 3 || $id_category_product == 4) {
            $pathUpload = 'images\meat';
            $pathSave = 'meat/';
        } else {
            $pathUpload = 'images\merge';
            $pathSave = 'merge/';
        }
        if($request -> has('image_main')) {
            $imageMain = $request -> image_main;
            $imageNameMain = $imageMain -> getClientOriginalName();
            $uploadImgMain = $imageMain -> move(public_path($pathUpload), $imageNameMain);
            $pathImageMain = $pathSave . $imageNameMain;
        } 
        if($request -> has('image_two')) {
            $imageTwo = $request -> image_two;
            $imageNameTwo = $imageTwo -> getClientOriginalName();
            $uploadImgTwo = $imageTwo -> move(public_path($pathUpload), $imageNameTwo);
            $pathImageTwo = $pathSave . $imageNameTwo;
        } else {
            $pathImageTwo = "";
        }
        if($request -> has('image_three')) {
            $imageThree = $request -> image_three;
            $imageNameThree = $imageThree -> getClientOriginalName();
            $uploadImgThree = $imageThree -> move(public_path($pathUpload), $imageNameThree);
            $pathImageThree = $pathSave . $imageNameThree;
        } else {
            $pathImageThree = "";
        }
        if($request -> has('image_four')) {
            $imageFour = $request -> image_four;
            $imageNameFour = $imageFour -> getClientOriginalName();
            $uploadImgFour = $imageFour -> move(public_path($pathUpload), $imageNameFour);
            $pathImageFour = $pathSave . $imageNameFour;
        } else {
            $pathImageFour = "";
        }
        $result = Products::insert([
            'name' => $name,
            'price' => $price,
            'discount' => $discount,
            'description' => $description,
            'details' => $details,
            'state' => $state,
            'image_main' => $pathImageMain,
            'image_two' => $pathImageTwo,
            'image_three' => $pathImageThree,
            'image_four' => $pathImageFour,
            'id_category_product' => $id_category_product,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        if($result && $uploadImgMain) {
            Session::flash('success', "Thêm sản phẩm thành công!");
            return Redirect::route('admin.products');
        } else {
            Session::flash('failed', "Thêm sản phẩm thất bại!");
            return Redirect::route('admin.products');
        }  
    }

    public function viewEditProduct($id)
    {
        $product = Products::find($id) -> getOriginal();
        $categoryProduct = CategoryProduct::select('id', 'name') -> get() -> toArray();
        return View::make('admin.layouts.products.edit_product', compact([
            'product', 'categoryProduct'
        ]));
    }

    public function updateProduct(Request $request)
    {
        $id = $request-> id_product;
        $name = $request -> name_product;
        $price = $request -> price_product;
        $discount = $request -> discount_product;
        $description = $request -> desc_product;
        $details = $request -> details_product;
        $state = $request -> state_product;
        $id_category_product = $request -> category_product;
        // Truy vấn và xóa ảnh cũ
        $product = Products::find($id) -> toArray();
        $pathUnlink = 'images/';
        $rsRemoveImg = false;
        if($product['image_main']) {
            if(File::exists($pathUnlink . $product['image_main'])) {
                $rsRemoveImg = File::delete($pathUnlink . $product['image_main']);
            }
        }
        if($product['image_two']) {
            if(File::exists($pathUnlink . $product['image_two'])) {
                File::delete($pathUnlink . $product['image_two']);
            }
        }
        if($product['image_three']) {
            if(File::exists($pathUnlink . $product['image_three'])) {
                File::delete($pathUnlink . $product['image_three']);
            }
        }
        if($product['image_four']) {
            if(File::exists($pathUnlink . $product['image_four'])) {
                File::delete($pathUnlink . $product['image_four']);
            }
        }
        // Upload ảnh mới
        if($id_category_product == 1) {
            $pathUpload = 'images\fruits';
            $pathSave = 'fruits/';
        } else if ($id_category_product == 2) {
            $pathUpload = 'images\vegetables';
            $pathSave = 'vegetables/';
        } else if ($id_category_product == 3 || $id_category_product == 4) {
            $pathUpload = 'images\meat';
            $pathSave = 'meat/';
        } else {
            $pathUpload = 'images\merge';
            $pathSave = 'merge/';
        }
        if($request -> has('image_main')) {
            $imageMain = $request -> image_main;
            $imageNameMain = $imageMain -> getClientOriginalName();
            $uploadImgMain = $imageMain -> move(public_path($pathUpload), $imageNameMain);
            $pathImageMain = $pathSave . $imageNameMain;
        } 
        if($request -> has('image_two')) {
            $imageTwo = $request -> image_two;
            $imageNameTwo = $imageTwo -> getClientOriginalName();
            $uploadImgTwo = $imageTwo -> move(public_path($pathUpload), $imageNameTwo);
            $pathImageTwo = $pathSave . $imageNameTwo;
        } else {
            $pathImageTwo = "";
        }
        if($request -> has('image_three')) {
            $imageThree = $request -> image_three;
            $imageNameThree = $imageThree -> getClientOriginalName();
            $uploadImgThree = $imageThree -> move(public_path($pathUpload), $imageNameThree);
            $pathImageThree = $pathSave . $imageNameThree;
        } else {
            $pathImageThree = "";
        }
        if($request -> has('image_four')) {
            $imageFour = $request -> image_four;
            $imageNameFour = $imageFour -> getClientOriginalName();
            $uploadImgFour = $imageFour -> move(public_path($pathUpload), $imageNameFour);
            $pathImageFour = $pathSave . $imageNameFour;
        } else {
            $pathImageFour = "";
        }
        // Cập nhật dữ liệu trong MySQL
        $result = Products::where('id', $id) -> update([
            'name' => $name,
            'price' => $price,
            'discount' => $discount,
            'description' => $description,
            'details' => $details,
            'state' => $state,
            'image_main' => $pathImageMain,
            'image_two' => $pathImageTwo,
            'image_three' => $pathImageThree,
            'image_four' => $pathImageFour,
            'id_category_product' => $id_category_product,
            'updated_at' => Carbon::now()
        ]);
        if($result && $rsRemoveImg && $uploadImgMain) {
            Session::flash('success', "Cập nhật thông tin sản phẩm thành công!");
            return Redirect::route('admin.products');
        } else {
            Session::flash('failed', "Cập nhật thông tin sản phẩm thất bại!");
            return Redirect::route('admin.products');
        }
    }

    public function deleteProduct($id)
    {
        $product = Products::find($id) -> toArray();
        $pathUnlink = 'images/';
        if($product['image_main']) {
            if(File::exists($pathUnlink . $product['image_main'])) {
                $rsRemoveImg = File::delete($pathUnlink . $product['image_main']);
            }
        }
        if($product['image_two']) {
            if(File::exists($pathUnlink . $product['image_two'])) {
                File::delete($pathUnlink . $product['image_two']);
            }
        }
        if($product['image_three']) {
            if(File::exists($pathUnlink . $product['image_three'])) {
                File::delete($pathUnlink . $product['image_three']);
            }
        }
        if($product['image_four']) {
            if(File::exists($pathUnlink . $product['image_four'])) {
                File::delete($pathUnlink . $product['image_four']);
            }
        }
        $result = Products::where('id', $id) -> delete();
        if($result && $rsRemoveImg) {
            Session::flash('success', "Xóa sản phẩm thành công!");
            return Redirect::route('admin.products');
        } else {
            Session::flash('failed', "Xóa sản phẩm thất bại!");
            return Redirect::route('admin.products');
        }
    }

    public function viewDetailsProduct($id)
    {
        $product = Products::find($id) -> getOriginal();
        $totalProducts = Products::count();
        return View::make('admin.layouts.products.details_product', compact('product', 'totalProducts'));
    }

    public function searchProductInDetails(Request $request) {
        if($request -> ajax()){
            $result = "";
            $query = $request -> all();
            $products = Products::select('name') -> search($query['query']) -> get() -> toArray();
            foreach ($products as $key => $value) { 
                $result .= "<div href='' class='result-search d-flex align-items-center' data-name='{$value['name']}'>
                                <img src='{$request -> getSchemeAndHttpHost()}/images/svg/search2.svg' alt=''>
                                <p class='title-result' title='{$value['name']}'>{$value['name']}</p>
                            </div>";
            }
            return Response::json($result);
        } else {
            $query = $request -> search;
            $products = Products::search($query) -> paginate(10);
            return  View::make('admin.layouts.products.list_product', compact('products'));
        }
    }

    public function searchProduct(Request $request)
    {
        $products = Products::orderBy('id', 'desc') -> search($request -> search) -> paginate(1);
        return View::make('admin.layouts.products.list_product', compact('products'));
    }

}
