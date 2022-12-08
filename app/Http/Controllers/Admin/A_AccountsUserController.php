<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use App\Models\Authorization;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class A_AccountsUserController extends Controller
{
    public function index(Request $request)
    {
        // Autocomplete search
        if($request -> queryAutocomplete) {
            $resutl = "";
            $query =  $request -> queryAutocomplete;
            $users = Users::select('fullname') -> search($query) -> get() -> toArray();
            foreach ($users as $key => $value) { 
                $resutl .= "<div href='' class='result-search d-flex align-items-center' data-name='{$value['fullname']}'>
                                <img src='{$request -> getSchemeAndHttpHost()}/images/svg/search2.svg' alt=''>
                                <p class='title-result' title='{$value['fullname']}'>{$value['fullname']}</p>
                            </div>";
            }
            return $resutl;
        }
        // Not autocomplete search
        if ($request -> sortby && !$request -> amount) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $users = Users::join('tbl_authorization', 'tbl_users.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_users.id', 'fullname', 'email',  'avatar', 'password', 'tbl_authorization.name', 'id_authorization')
            -> orderBy("$sortby", "$type")  -> paginate(5);
        } elseif (!$request -> sortby && $request -> amount) {
            $users = Users::join('tbl_authorization', 'tbl_users.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_users.id', 'fullname', 'email',  'avatar', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy('tbl_users.id', 'desc') -> paginate($request -> amount);
        } elseif ($request -> sortby && $request -> amount) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $amount = $request -> amount;
            $users = Users::join('tbl_authorization', 'tbl_users.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_users.id', 'fullname', 'email',  'avatar', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy("$sortby", "$type") -> paginate($amount);
        } elseif (!$request -> sortby && !$request -> amount && $request -> search) {
            $search = $request -> search;
            $users = Users::join('tbl_authorization', 'tbl_users.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_users.id', 'fullname', 'email',  'avatar', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy('tbl_users.id', 'desc') -> search($search) -> paginate(5);
        } elseif (!$request -> sortby && $request -> amount && $request -> search) {
            $amount = $request -> amount;
            $search = $request -> search;
            $users = Users::join('tbl_authorization', 'tbl_users.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_users.id', 'fullname', 'email',  'avatar', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy('tbl_users.id', 'desc') -> search($search) -> paginate($amount);
        } elseif ($request -> sortby && !$request -> amount && $request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $search = $request -> search;
            $users = Users::join('tbl_authorization', 'tbl_users.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_users.id', 'fullname', 'email',  'avatar', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy("$sortby", "$type") -> search($search) -> paginate(5);
        } elseif ($request -> sortby && $request -> amount && $request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $amount = $request -> amount;
            $search = $request -> search;
            $users = Users::join('tbl_authorization', 'tbl_users.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_users.id', 'fullname', 'email',  'avatar', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> rderBy("$sortby", "$type") -> search($search) -> paginate($amount);
        } else {
            $users = Users::join('tbl_authorization', 'tbl_users.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_users.id', 'fullname', 'email',  'avatar', 'password', 'tbl_authorization.name', 'id_authorization') 
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
