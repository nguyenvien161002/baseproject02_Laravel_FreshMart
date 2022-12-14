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
        $pathImageSub = [];
        if($request -> has('images_sub')) {
            $imageSubArray = $request -> images_sub;
            foreach($imageSubArray as $imageSub) {
                $imageName = $imageSub -> getClientOriginalName();
                $uploadImgSub = $imageSub -> move(public_path($pathUpload), $imageName);
                array_push($pathImageSub, "$pathSave" . "$imageName");
            }
        } 

        if($request -> has('image_main')) {
            $imageMain = $request -> image_main;
            $imageNameMain =  $imageMain -> getClientOriginalName();
            $uploadImgMain = $imageMain -> move(public_path($pathUpload), $imageNameMain);
            $pathImageMain = "$pathSave" . "$imageNameMain";
        }
        $result = Products::insert([
            'name' => $name,
            'price' => $price,
            'discount' => $discount,
            'description' => $description,
            'details' => $details,
            'state' => $state,
            'image_main' => $pathImageMain,
            'images_sub' => implode("|", $pathImageSub),
            'id_category_product' => $id_category_product,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        if($result && $uploadImgSub && $uploadImgMain) {
            Session::flash('success', "Th??m s???n ph???m th??nh c??ng!");
            return Redirect::route('admin.products');
        } else {
            Session::flash('failed', "Th??m s???n ph???m th???t b???i!");
            return Redirect::route('admin.products');
        }  
    }

    public function viewEditProduct($id)
    {
        $product = Products::find($id) -> getOriginal();
        $images_sub = explode("|", $product['images_sub']);
        $categoryProduct = CategoryProduct::select('id', 'name') -> get() -> toArray();
        return View::make('admin.layouts.products.edit_product', compact([
            'product', 'categoryProduct', 'images_sub'
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
        // Truy v???n v?? x??a ???nh c??
        $product = Products::find($id) -> toArray();
        $pathUnlink = 'images/';
        $rsRemoveImg = false;
        $images_sub = explode("|", $product['images_sub']);
        foreach($images_sub as $image => $url) { 
            if(File::exists($pathUnlink . $url)) {
                $rsRemoveImg = File::delete($pathUnlink . $url);
            }
        }
        if($product['image_main']) {
            if(File::exists($pathUnlink . $product['image_main'])) {
                $rsRemoveImg = File::delete($pathUnlink . $product['image_main']);
            }
        }
        // Upload ???nh m???i
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
        $pathImageSub = [];
        if($request -> has('images_sub')) {
            $imageSubArray = $request -> images_sub;
            foreach($imageSubArray as $imageSub) {
                $imageName = $imageSub -> getClientOriginalName();
                $uploadImgSub = $imageSub -> move(public_path($pathUpload), $imageName);
                array_push($pathImageSub, "$pathSave" . "$imageName");
            }
        } 

        if($request -> has('image_main')) {
            $imageMain = $request -> image_main;
            $imageNameMain =  $imageMain -> getClientOriginalName();
            $uploadImgMain = $imageMain -> move(public_path($pathUpload), $imageNameMain);
            $pathImageMain = "$pathSave" . "$imageNameMain";
        }
        // C???p nh???t d??? li???u trong MySQL
        $result = Products::where('id', $id) -> update([
            'name' => $name,
            'price' => $price,
            'discount' => $discount,
            'description' => $description,
            'details' => $details,
            'state' => $state,
            'image_main' => $pathImageMain,
            'images_sub' => implode("|", $pathImageSub),
            'id_category_product' => $id_category_product,
            'updated_at' => Carbon::now()
        ]);
        if($result && $rsRemoveImg && $uploadImgMain) {
            Session::flash('success', "C???p nh???t th??ng tin s???n ph???m th??nh c??ng!");
            return Redirect::route('admin.products');
        } else {
            Session::flash('failed', "C???p nh???t th??ng tin s???n ph???m th???t b???i!");
            return Redirect::route('admin.products');
        }
    }

    public function deleteProduct($id)
    {
        $product = Products::find($id) -> toArray();
        $pathUnlink = 'images/';
        $image_main = $product['image_main'];
        if(File::exists($pathUnlink . $image_main)) {
            $rsRemoveImgMain = File::delete($pathUnlink . $image_main);
        }
        $images_sub = explode("|", $product['images_sub']);
        foreach($images_sub as $image => $url) { 
            if(File::exists($pathUnlink . $url)) {
                $rsRemoveImgSub = File::delete($pathUnlink . $url);
            }
        }
        $result = Products::where('id', $id) -> delete();
        if($result && $rsRemoveImgMain && $rsRemoveImgSub) {
            Session::flash('success', "X??a s???n ph???m th??nh c??ng!");
            return Redirect::route('admin.products');
        } else {
            Session::flash('failed', "X??a s???n ph???m th???t b???i!");
            return Redirect::route('admin.products');
        }
    }

    public function viewDetailsProduct($id)
    {
        $product = Products::find($id) -> getOriginal();
        $images_sub = explode("|", $product['images_sub']);
        $totalProducts = Products::count();
        return View::make('admin.layouts.products.details_product', compact('product', 'images_sub', 'totalProducts'));
    }

    public function updateStateProduct(Request $request) {
        $id = $request-> id;
        $state = $request -> state == 'public' ? '1' : '0';
        $result = Products::where('id', $id) -> update([
            'state' => $state,
            'updated_at' => Carbon::now()
        ]);
        if($result) {
            Session::flash('success', "C???p nh???t tr???ng th??i s???n ph???m th??nh c??ng!");
            return Redirect::route('admin.products');
        } else {
            Session::flash('failed', "C???p nh???t tr???ng th??i s???n ph???m th???t b???i!");
            return Redirect::route('admin.products');
        } 
    }

}
