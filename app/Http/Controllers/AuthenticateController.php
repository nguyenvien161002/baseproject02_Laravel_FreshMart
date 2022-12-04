<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\A_AccountsUserController;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Admin;
use App\Models\Staffs;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Carbon;

class AuthenticateController extends Controller
{

    public function index()
    {
        return View::make("auth.clients.login.login");
    }

    public function loginAdmin()
    {
        return view("auth.admin.admin");
    }

    public function authLoginAdmin(Request $request)
    {
        $admin_name = $request->admin_name; // (u1)
        $password = md5($request->password); // (p1)
        $passwordNotMd5 = $request->password; // (p1)
        $data['admin_name'] = Admin::select('admin_name')->where('admin_name', $admin_name)->first(); // (tvu)
        if ($data['admin_name']) {
            $data['password'] = Admin::select('password')
                ->where('password', $password)
                ->where('admin_name', $data['admin_name']->admin_name)
                ->first();
            if ($data['password']) {
                $data['admin_name'] = $data['admin_name']->admin_name;
                $data['password'] = $data['password']->password;
            }
        } else {
            $data['password'] = Admin::select('password')->where('password', $password)->first(); // (tvp)
        }
        // Vào truy vấn admin_name (tvu) trước nếu admin_name mà đúng thì từ admin_name và (q1) truy vấn password
        // Nếu password = null => sai => sai mật khẩu || nếu password != null => đúng => login thành công
        // Nếu mà truy vấn admin_name (tvu) sai thì truy vấn password (tvp)
        // Nếu password = null => sai => sai cả tài khoản và mật khẩu || nếu password != null => đúng => sai tài khoản
        if ($data['admin_name'] && $data['password']) {
            $user = Admin::select('id', 'admin_name', 'id_authorization')->where('admin_name', $data['admin_name'])
                ->where('password', $data['password'])->get()->toArray();
            foreach ($user as $key) {
                Session::put('id', $key['id']);
                Session::put('name', $key['admin_name']);
                Session::put('id_authorization', $key['id_authorization']);
            }
            Session::put('is_login', true);
            return Redirect::route('admin');
        }
        if ($data['admin_name'] && $data['password'] == null) {
            Session::flash('admin_name', $admin_name);
            Session::flash('failed', "Sai mât khẩu, vui lòng nhâp lại!");
            return Redirect::to('login/admin');
        }
        if ($data['admin_name'] == null && $data['password']) {
            Session::flash('failed', "Sai tên đăng nhâp, vui lòng nhâp lại!");
            return Redirect::to('login/admin');
        }
        if ($data['admin_name'] == null && $data['password'] == null) {
            Session::flash('failed', "Sai tên đăng nhâp và mật khẩu, vui lòng nhâp lại!");
            return Redirect::to('login/admin');
        }
    }

    public function loginStaff()
    {
        return view("auth.admin.staff");
    }

    public function authLoginStaff(Request $request)
    {
        $staff_name = $request->username; // (u1)
        $password = md5($request->password); // (p1)
        $data['staff_name'] = Staffs::select('staff_name')->where('staff_name', $staff_name)->first(); // (tvu)
        if ($data['staff_name']) {
            $data['password'] = Staffs::select('password')
                ->where('password', $password)
                ->where('staff_name', $data['staff_name']->staff_name)
                ->first();
            if ($data['password']) {
                $data['staff_name'] = $data['staff_name']->staff_name;
                $data['password'] = $data['password']->password;
            }
        } else {
            $data['password'] = Staffs::select('password')->where('password', $password)->first(); // (tvp)
        }
        // Vào truy vấn staff_name (tvu) trước nếu staff_name mà đúng thì từ staff_name và (q1) truy vấn password
        // Nếu password = null => sai => sai mật khẩu || nếu password != null => đúng => login thành công
        // Nếu mà truy vấn staff_name (tvu) sai thì truy vấn password (tvp)
        // Nếu password = null => sai => sai cả tài khoản và mật khẩu || nếu password != null => đúng => sai tài khoản
        if ($data['staff_name'] && $data['password']) {
            $user = Staffs::select('id', 'staff_name', 'id_authorization')->where('staff_name', $data['staff_name'])
                ->where('password', $data['password'])->get()->toArray();
            foreach ($user as $key) {
                Session::put('id', $key['id']);
                Session::put('name', $key['staff_name']);
                Session::put('id_authorization', $key['id_authorization']);
            }
            Session::put('is_login', true);
            return Redirect::route('admin');
        }
        if ($data['staff_name'] && $data['password'] == null) {
            Session::flash('staff_name', $staff_name);
            Session::flash('failed', "Sai mât khẩu, vui lòng nhâp lại!");
            return Redirect::to('login/staff');
        }
        if ($data['staff_name'] == null && $data['password']) {
            Session::flash('failed', "Sai tên đăng nhâp, vui lòng nhâp lại!");
            return Redirect::to('login/staff');
        }
        if ($data['staff_name'] == null && $data['password'] == null) {
            Session::flash('failed', "Sai tên đăng nhâp và mật khẩu, vui lòng nhâp lại!");
            return Redirect::to('login/staff');
        }
    }

    public function loginAccount()
    {
        return View::make("auth.clients.login.account");
    }

    public function authLoginAccount(Request $request)
    {
        $email = $request->email; 
        $password = md5($request->password);
        $data['email'] = Users::select('email')->where('email', $email)->first();
        if ($data['email']) {
            $data['password'] = Users::select('password')
                ->where('password', $password)
                ->where('email', $data['email']->email)
                ->first();
            if ($data['password']) {
                $data['email'] = $data['email']->email;
                $data['password'] = $data['password']->password;
            }
        } else {
            $data['password'] = Users::select('password')->where('password', $password)->first(); 
        }
        if ($data['email'] && $data['password']) {
            $user = Users::select('id', 'fullname', 'email', 'id_authorization')->where('email', $data['email'])
                ->where('password', $data['password'])->get()->toArray();
            foreach ($user as $key) {
                Session::put('id', $key['id']);
                Session::put('fullname', $key['fullname']);
                Session::put('email', $key['email']);
                Session::put('id_authorization', $key['id_authorization']);
            }
            Session::put('is_login', true);
            return Redirect::route('home');
        }
        if ($data['email'] && $data['password'] == null) {
            Session::flash('failed', "Sai mât khẩu, vui lòng nhâp lại!");
            return Redirect::route('login.account');
        }
        if ($data['email'] == null && $data['password']) {
            Session::flash('failed', "Sai tên đăng nhâp, vui lòng nhâp lại!");
            return Redirect::route('login.account');
        }
        if ($data['email'] == null && $data['password'] == null) {
            Session::flash('failed', "Sai tên đăng nhâp và mật khẩu, vui lòng nhâp lại!");
            return Redirect::route('login.account');
        }
    }

    public function logout()
    {
        Session::flush();
        return Redirect::route('home');
    }

    public function registerAccount() {
        return View::make('auth.clients.register');
    }

    public function authRegisterAccount(Request $request)
    {
        $fullname = $request -> fullname;
        $email = $request -> email;
        $passwordNotMd5 = $request -> password;
        $password = md5($request -> password);
        $confirm_passwordNotMd5 = $request -> confirm_password;
        $confirm_password = md5($request -> confirm_password);
        $duplicate_email = Users::where('email', $email) -> get() -> toArray();
        if($password === $confirm_password && !$duplicate_email) {
            $result = Users::insert([
                'id' => A_AccountsUserController::randomCode(),
                'fullname' => $fullname,
                'email' => $email,
                'password' => $password,
                'confirm_password' => $confirm_password,
                'id_authorization' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            if($result) {
                Session::flash('success', "Chúc mừng bạn đã đăng ký thành công!");
                return Redirect::route('login.account');
            } else {
                Session::flash('failed', "Đăng ký thất bại, vui lòng thử lại!");
                return Redirect::route('login.account');
            }
        } 

        if($password !== $confirm_password && $duplicate_email) {
            Session::flash('fullname', $fullname);
            Session::flash('password', $passwordNotMd5);
            Session::flash('failed', "Mật khẩu không trùng khớp và email đã được sử dụng, vui lòng nhâp lại!");
            return Redirect::route('register.account');
        }

        if($password !== $confirm_password) {
            Session::flash('fullname', $fullname);
            Session::flash('email', $email);
            Session::flash('password', $passwordNotMd5);
            Session::flash('failed', "Mật khẩu không trùng khớp vui lòng nhâp lại!");
            return Redirect::route('register.account');
        }
        if($duplicate_email) {
            Session::flash('fullname', $fullname);
            Session::flash('password', $passwordNotMd5);
            Session::flash('confirm_password', $confirm_passwordNotMd5);
            Session::flash('failed', "Email đã được sử dụng, vui lòng điền email khác!");
            return Redirect::route('register.account');
        }
    }

}
