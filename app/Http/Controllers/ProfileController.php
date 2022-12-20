<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\CategoryProduct;
use App\Models\Products;
use App\Models\Users;
use App\Models\Orders;
use App\Models\AddressUser;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function index($id)
    {
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        $user = Users::where('id', $id) -> get() -> toArray();
        $total_address = AddressUser::where('id_user', $id) -> get() -> count();
        $info = "active";
        return View::make('clients.layouts.profile.includes.information', compact([
            'category_product', 'user', 'info', 'total_address'
        ]));
    }

    public function manageAddress($id)
    {
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        $user = Users::where('id', $id) -> get() -> toArray();
        $manageAddress = "active";
        $address_default = AddressUser::where('id_user', $id) -> where('state', 1) -> get() -> toArray();
        $address_different = AddressUser::where('id_user', $id) -> where('state', 0) -> get() -> toArray();
        $total_address = AddressUser::where('id_user', $id) -> get() -> count();
        if(count($address_default) != 0) {
            $components_address = explode("|", $address_default[0]['address_default']);
            $address_default_fm = "";
            for($i = 0; $i < count($components_address); $i++) { 
                if($i == count($components_address) - 1) {
                    $address_default_fm .= " $components_address[$i]";
                } else {
                    $address_default_fm .= " $components_address[$i],";
                }
            }
            return View::make('clients.layouts.profile.includes.manageaddress', compact([
                'category_product', 'user', 'manageAddress', 'address_default', 
                'address_default_fm', 'address_different', 'total_address'
            ]));
        } 
        return View::make('clients.layouts.profile.includes.manageaddress', compact([
            'category_product', 'user', 'manageAddress', 'address_different', 'total_address'
        ]));
    }

    public function addAddress($id_user, Request $request)
    {
        $id_user = $id_user;
        $address = AddressUser::where([
            ['id_user', $id_user],
            ['address_default', "$request->street|$request->ward|$request->district|$request->province"],
            ['number_phone', $request->number_phone]
        ])->get()->count();
        if($address == 0) {
            if($request->address_default_checkbox == "on") {
                $userUpdateAddress = AddressUser::where('id_user', $id_user)->get()->toArray();
                foreach($userUpdateAddress as $key => $value) { 
                    AddressUser::where('id_user', $id_user)->update([
                        'state' => 0
                    ]);
                }
            }
            $result = AddressUser::insert([
                'id_user' => $id_user,
                'fullname' => $request->fullname,
                'address_default' => "$request->street|$request->ward|$request->district|$request->province",
                'number_phone' => $request->number_phone,
                'state' => $request->address_default_checkbox == "on" ? 1 : 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            if($result) {
                Session::flash('success', "Thêm địa chỉ thành công!");
                return Redirect::route('manage.address', ['id' => $id_user]);
            } else {
                Session::flash('failed', "Thêm địa chỉ thất bại!");
                return Redirect::route('manage.address', ['id' => $id_user]);
            }
        } else {
            Session::flash('failed', "Địa chỉ đã tồn tại");
            return Redirect::route('manage.address', ['id' => $id_user]);
        }
    }

    public function getAddress($id) { 
        $address_default = AddressUser::where('id', $id) -> get() -> toArray();
        return $address_default;
    }

    public function updateAddress($id_user, $id, Request $request)
    {
        if($request->address_default_checkbox == "on") {
            $userUpdateAddress = AddressUser::where('id_user', $id_user)->get()->toArray();
            foreach($userUpdateAddress as $key => $value) { 
                AddressUser::where('id_user', $id_user)->update([
                    'state' => 0
                ]);
            }
        }
        $result = AddressUser::where('id', $id) -> update([
            'fullname' => $request->fullname,
            'address_default' => "$request->street|$request->ward|$request->district|$request->province",
            'number_phone' => $request->number_phone,
            'state' => $request->address_default_checkbox == "on" ? 1 : 0,
            'updated_at' => Carbon::now(),
        ]);
        if($result) {
            Session::flash('success', "Bạn đã cập nhật địa chỉ thành công!");
            return Redirect::route('manage.address', ['id' => $id_user]);
        } else {
            Session::flash('failed', "Bạn đã cập nhật địa chỉ thất bại!");
            return Redirect::route('manage.address', ['id' => $id_user]);
        }
    }

    public function deleteAddress($id_user, $id)
    {
        $id_user = $id_user;
        $result = AddressUser::where('id_user', $id_user) -> where('id', $id) -> delete();
        if($result) {
            Session::flash('addAddressSuccess', true);
            return Redirect::route('manage.address', ['id' => $id_user]);
        } else {
            Session::flash('addAddressFailed', true);
            return Redirect::route('manage.address', ['id' => $id_user]);
        }
    }

    public function changePassword($id)
    {
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        $user = Users::where('id', $id) -> get() -> toArray();
        $changePassword = "active";
        return View::make('clients.layouts.profile.includes.changepassword', compact([
            'category_product', 'user', 'changePassword'
        ]));
    }

    public function changeAvatar($id)
    {
        $category_product = CategoryProduct::where('state', 1) -> get() -> toArray();
        $user = Users::where('id', $id) -> get() -> toArray();
        $changeAvatar = "active";
        return View::make('clients.layouts.profile.includes.changeavatar', compact([
            'category_product', 'user', 'changeAvatar'
        ]));
    }
}
