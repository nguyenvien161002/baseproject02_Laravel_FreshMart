<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Users;
use App\Models\Authorization;
use Illuminate\Support\Carbon;

class A_AccountsUserController extends Controller
{
    public function index(Request $request)
    {
        if ($request -> sortby && !$request -> amount) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $users = Users::join('tbl_authorization', 'tbl_users.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_users.id', 'fullname', 'email', 'password', 'tbl_authorization.name', 'id_authorization')
            -> orderBy("$sortby", "$type")  -> paginate(5);
        } elseif (!$request -> sortby && $request -> amount) {
            $users = Users::join('tbl_authorization', 'tbl_users.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_users.id', 'fullname', 'email', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy('tbl_users.id', 'desc') -> paginate($request -> amount);
        } elseif ($request -> sortby && $request -> amount) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $amount = $request -> amount;
            $users = Users::join('tbl_authorization', 'tbl_users.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_users.id', 'fullname', 'email', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy("$sortby", "$type") -> paginate($amount);
        } else {
            $users = Users::join('tbl_authorization', 'tbl_users.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_users.id', 'fullname', 'email', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy('tbl_users.id', 'desc') -> paginate(5);
        }
        Session::put('down', 'down');
        return View::make('admin.layouts.accounts.user.list_account', compact('users'));
    }

    public function viewAddAccount()
    {
        $authorization = Authorization::where('tbl_authorization.id', 3) ->select('id', 'name') -> get() -> toArray();
        return View::make('admin.layouts.accounts.user.add_account', compact('authorization'));
    }

    public function insertAccount(Request $request)
    {
        $id = $this -> randomCode();
        $fullname = $request->fullname;
        $email = $request->email;
        $password = md5($request->password);
        $confirmPassword = md5($request->confirm_password);
        $id_authorization = $request->id_authorization;
        $result = Users::insert([
            'id' => $id,
            'fullname' => $fullname,
            'email' => $email,
            'password' => $password,
            'confirm_password' => $confirmPassword,
            'id_authorization' => $id_authorization,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        if ($result) {
            Session::flash('success', "Thêm tài khoản thành công!");
            return Redirect::route('admin.accounts.user');
        } else {
            Session::flash('failed', "Thêm tài khoản thất bại!");
            return Redirect::route('admin.accounts.user');
        }
    }

    public function viewEditAccount($id)
    {
        $account = Users::find($id) -> getOriginal();
        $authorization = Authorization::where('tbl_authorization.id', 3) -> select('id', 'name') -> get() -> toArray();
        return View::make('admin.layouts.accounts.user.edit_account', compact([
            'account', 'authorization'
        ]));
    }

    public function updateAccount(Request $request)
    {
        $id = $request -> id_account;
        $fullname = $request -> fullname;
        $email = $request -> email;
        $password = md5($request -> password);
        $confirmPassword = md5($request -> confirm_password);
        $id_authorization = $request -> id_authorization;
        $result = Users::where('id', $id) -> update([
            'fullname' => $fullname,
            'email' => $email,
            'password' => $password,
            'confirm_password' => $confirmPassword,
            'id_authorization' => $id_authorization,
            'updated_at' => Carbon::now()
        ]);
        if($result) {
            Session::flash('success', "Sửa thông tin tài khoản thành công!");
            return Redirect::route('admin.accounts.user');
        } else {
            Session::flash('failed', "Sửa thông tin tài khoản thất bại!");
            return Redirect::route('admin.accounts.user');
        }
    }

    public function deleteAccount($id)
    {
        
        $result = Users::where('id', $id) -> delete();
        if($result) {
            Session::flash('success', "Xóa tài khoản thành công!");
            return Redirect::route('admin.accounts.user');
        } else {
            Session::flash('failed', "Xóa tài khoản thất bại!");
            return Redirect::route('admin.accounts.user');
        }
    }

    public function viewDetailsAccount($id)
    {
        $account = Users::join('tbl_authorization', 'tbl_users.id_authorization', '=', 'tbl_authorization.id') 
        -> select('tbl_users.id', 'fullname', 'email', 'avatar', 'password', 'confirm_password', 'tbl_authorization.name', 'tbl_authorization.description') 
        -> where('tbl_users.id', $id) -> get() -> toArray();
        $totalAccounts = Users::count();
        return View::make('admin.layouts.accounts.user.details_account', compact('account', 'totalAccounts'));
    }

    public static function randomCode() {
        $characters = '0123456789';
        $code = '';
        for ($i = 1; $i < 10; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $code .= $characters[$index];
        }
        return $code;
    }
}
