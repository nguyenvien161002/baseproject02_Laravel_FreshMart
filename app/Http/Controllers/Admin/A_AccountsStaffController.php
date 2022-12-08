<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staffs;
use App\Models\Authorization;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class A_AccountsStaffController extends Controller
{
    public function index(Request $request)
    {
        // Autocomplete search
        if($request -> queryAutocomplete) {
            $resutl = "";
            $query =  $request -> queryAutocomplete;
            $staffs = Staffs::select('staff_name') -> search($query) -> get() -> toArray();
            foreach ($staffs as $key => $value) { 
                $resutl .= "<div href='' class='result-search d-flex align-items-center' data-name='{$value['staff_name']}'>
                                <img src='{$request -> getSchemeAndHttpHost()}/images/svg/search2.svg' alt=''>
                                <p class='title-result' title='{$value['staff_name']}'>{$value['staff_name']}</p>
                            </div>";
            }
            return $resutl;
        }
        // Not autocomplete search
        if ($request -> sortby && !$request -> amoun && !$request -> searcht) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $staffs = Staffs::join('tbl_authorization', 'tbl_staffs.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_staffs.id', 'staff_name', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy("$sortby", "$type")  -> paginate(5);
        } elseif (!$request -> sortby && $request -> amount && !$request -> search) {
            $staffs = Staffs::join('tbl_authorization', 'tbl_staffs.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_staffs.id', 'staff_name', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy('tbl_staffs.id', 'desc') -> paginate($request -> amount);
        } elseif ($request -> sortby && $request -> amount && !$request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $amount = $request -> amount;
            $staffs = Staffs::join('tbl_authorization', 'tbl_staffs.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_staffs.id', 'staff_name', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy("$sortby", "$type")  -> paginate($amount);
        } elseif (!$request -> sortby && !$request -> amount && $request -> search) {
            $search = $request -> search;
            $staffs = Staffs::join('tbl_authorization', 'tbl_staffs.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_staffs.id', 'staff_name', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy('tbl_staffs.id', 'desc') -> search($search) -> paginate(5);
        } elseif (!$request -> sortby && $request -> amount && $request -> search) {
            $amount = $request -> amount;
            $search = $request -> search;
            $staffs = Staffs::join('tbl_authorization', 'tbl_staffs.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_staffs.id', 'staff_name', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy('tbl_staffs.id', 'desc') -> search($search) -> paginate($amount);
        } elseif ($request -> sortby && !$request -> amount && $request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $search = $request -> search;
            $staffs = Staffs::join('tbl_authorization', 'tbl_staffs.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_staffs.id', 'staff_name', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy("$sortby", "$type") -> search($search) -> paginate(5);
        } elseif ($request -> sortby && $request -> amount && $request -> search) {
            $sortby = $request -> sortby;
            $type = $request -> type;
            $amount = $request -> amount;
            $search = $request -> search;
            $staffs = Staffs::join('tbl_authorization', 'tbl_staffs.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_staffs.id', 'staff_name', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy("$sortby", "$type") -> search($search) -> paginate($amount);
        } else {
            $staffs = Staffs::join('tbl_authorization', 'tbl_staffs.id_authorization', '=', 'tbl_authorization.id')
            -> select('tbl_staffs.id', 'staff_name', 'password', 'tbl_authorization.name', 'id_authorization') 
            -> orderBy('tbl_staffs.id', 'desc') -> paginate(5);
        }
        Session::put('down', 'down');
        return View::make('admin.layouts.accounts.staff.list_account', compact('staffs'));
    }

    public function viewAddAccount()
    {
        $authorization = Authorization::where('tbl_authorization.id', 2) -> select('id', 'name') -> get() -> toArray();
        return View::make('admin.layouts.accounts.staff.add_account', compact('authorization'));
    }

    public function insertAccount(Request $request)
    {
        $staff_name = $request->staff_name;
        $password = md5($request->password);
        $confirmPassword = md5($request->confirm_password);
        $id_authorization = $request->id_authorization;
        $check = Staffs::where('staff_name', $staff_name) -> get() -> toArray();
        if(!$check) {
            $result = Staffs::insert([
                'staff_name' => $staff_name,
                'password' => $password,
                'confirm_password' => $confirmPassword,
                'id_authorization' => $id_authorization,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            if ($result) {
                Session::flash('success', "Thêm tài khoản thành công!");
                return Redirect::route('admin.accounts.staffs');
            } else {
                Session::flash('failed', "Thêm tài khoản thất bại!");
                return Redirect::route('admin.accounts.staffs');
            }
        } else {
            Session::flash('failed', "Tên tài khoản đã được dùng!");
            return Redirect::to('admin/account/staff/add');
        }
        
    }

    public function viewEditAccount($id)
    {
        $account = Staffs::find($id) -> getOriginal();
        $authorization = Authorization::where('tbl_authorization.id', 2) -> select('id', 'name') -> get() -> toArray();
        return View::make('admin.layouts.accounts.staff.edit_account', compact([
            'account', 'authorization'
        ]));
    }

    public function updateAccount(Request $request)
    {
        $id = $request -> id_account;
        $staff_name = $request -> staff_name;
        $password = md5($request -> password);
        $confirmPassword = md5($request -> confirm_password);
        $id_authorization = $request -> id_authorization;
        $result = Staffs::where('id', $id) -> update([
            'staff_name' => $staff_name,
            'password' => $password,
            'confirm_password' => $confirmPassword,
            'id_authorization' => $id_authorization,
            'updated_at' => Carbon::now()
        ]);
        if($result) {
            Session::flash('success', "Sửa thông tin tài khoản thành công!");
            return Redirect::route('admin.accounts.staffs');
        } else {
            Session::flash('failed', "Sửa thông tin tài khoản thất bại!");
            return Redirect::route('admin.accounts.staffs');
        }
    }

    public function deleteAccount($id)
    {
        
        $result = Staffs::where('id', $id) -> delete();
        if($result) {
            Session::flash('success', "Xóa tài khoản thành công!");
            return Redirect::route('admin.accounts.staffs');
        } else {
            Session::flash('failed', "Xóa tài khoản thất bại!");
            return Redirect::route('admin.accounts.staffs');
        }
    }

    public function viewDetailsAccount($id)
    {
        $account = Staffs::join('tbl_authorization', 'tbl_staffs.id_authorization', '=', 'tbl_authorization.id') 
        -> select('tbl_staffs.id', 'staff_name', 'password', 'confirm_password', 'tbl_authorization.name', 'tbl_authorization.description') 
        -> where('tbl_staffs.id', $id) -> get() -> toArray();
        $totalAccounts = Staffs::count();
        return View::make('admin.layouts.accounts.staff.details_account', compact('account', 'totalAccounts'));
    }
}
