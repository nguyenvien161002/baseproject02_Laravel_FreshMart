<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\A_AccountsUserController;
use App\Mail\ForgotPwMail;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Admin;
use App\Models\Staffs;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Cookie;

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
            if ($request->remember_me) {
                Cookie::queue('admin_name', $user[0]['admin_name'], 1440);
                Cookie::queue('password_admin', $request->password, 1440);
                Cookie::queue('remember_me_admin', $request->remember_me, 1440);
            } else {
                Cookie::queue(Cookie::forget('admin_name'));
                Cookie::queue(Cookie::forget('password_admin'));
                Cookie::queue(Cookie::forget('remember_me_admin'));
            }
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
            $user = Users::select('id', 'fullname', 'email', 'id_authorization')
                ->where([
                    ['email', $data['email']],
                    ['password', $data['password']],
                    ['state', 1],
                ])
                ->get()->toArray();

            if ($user) {
                foreach ($user as $key) {
                    Session::put('id', $key['id']);
                    Session::put('fullname', $key['fullname']);
                    Session::put('email', $key['email']);
                    Session::put('id_authorization', $key['id_authorization']);
                }
                if ($request->remember_me) {
                    Cookie::queue('email', $email, 1440);
                    Cookie::queue('password', $request->password, 1440);
                    Cookie::queue('remember_me', $request->remember_me, 1440);
                } else {
                    if (Cookie::has('remember_me')) {
                        Cookie::queue(Cookie::forget('email'));
                        Cookie::queue(Cookie::forget('password'));
                        Cookie::queue(Cookie::forget('remember_me'));
                    }
                }
                Session::put('is_login', true);
                return Redirect::route('home');
            } else {
                Session::flash('failed', "Bạn chưa xác thực tài khoản, vui lòng kiểm tra email!");
                return Redirect::route('login.account');
            }
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

    public function registerAccount()
    {
        return View::make('auth.clients.register');
    }

    public function authRegisterAccount(Request $request)
    {
        $id = A_AccountsUserController::randomCode();
        $token = csrf_token();
        $fullname = $request->fullname;
        $email = $request->email;
        $passwordNotMd5 = $request->password;
        $password = md5($request->password);
        $confirm_passwordNotMd5 = $request->confirm_password;
        $confirm_password = md5($request->confirm_password);
        $duplicate_email = Users::where('email', $email)->get()->toArray();
        if ($password === $confirm_password && !$duplicate_email) {
            $result = Users::insert([
                'id' => $id,
                'fullname' => $fullname,
                'email' => $email,
                'password' => $password,
                'confirm_password' => $confirm_password,
                'state' => 0,
                'token' => $token,
                'id_authorization' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            if ($result) {
                $recipient = Users::find($id);
                $isMailer = Mail::to($recipient->email)->queue(new VerifyEmail($recipient));
                if ($isMailer) {
                    Session::flash('success', "Vui lòng kiểm tra email và xác thực tài khoản!");
                    return Redirect::route('login.account');
                } else {
                    Session::flash('failed', "Đăng kí tài khoản thất bại, vui lòng thử lại!");
                    return Redirect::route('register.account');
                }
            } else {
                Session::flash('failed', "Đăng ký thất bại, vui lòng thử lại!");
                return Redirect::route('register.account');
            }
        }

        if ($password !== $confirm_password && $duplicate_email) {
            Session::flash('fullname', $fullname);
            Session::flash('password', $passwordNotMd5);
            Session::flash('failed', "Mật khẩu không trùng khớp và email đã được sử dụng, vui lòng nhâp lại!");
            return Redirect::route('register.account');
        }

        if ($password !== $confirm_password) {
            Session::flash('fullname', $fullname);
            Session::flash('email', $email);
            Session::flash('password', $passwordNotMd5);
            Session::flash('failed', "Mật khẩu không trùng khớp vui lòng nhâp lại!");
            return Redirect::route('register.account');
        }
        if ($duplicate_email) {
            Session::flash('fullname', $fullname);
            Session::flash('password', $passwordNotMd5);
            Session::flash('confirm_password', $confirm_passwordNotMd5);
            Session::flash('failed', "Email đã được sử dụng, vui lòng điền email khác!");
            return Redirect::route('register.account');
        }
    }

    public function confirmEmail($id, $token)
    {
        $user = Users::find($id);
        if ($user->token === $token) {
            $result = Users::where('id', $id)->update([
                'state' => 1
            ]);
            if ($result) {
                Session::flash('success', "Xác thực thành công, bây giờ bạn có thể đăng nhập");
                return Redirect::route('login.account');
            }
        } else {
            Session::flash('failed', "Mã xác thực không lợp lệ!");
            return Redirect::route('login.account');
        }
    }

    public function forgotPassword()
    {
        return View::make("auth.clients.login.forgotpassword");
    }

    public function authForgotPassword(Request $request)
    {
        $email = $request->email;
        $recipient = Users::where('email', $email)-> first();
        if($recipient) {
            $isMailer = Mail::to($email)->queue(new ForgotPwMail($recipient));
            if ($isMailer) {
                Session::flash('success', "Vui lòng kiểm tra email để lấy lại mật khẩu!");
                return back();
            }
        } else {
            Session::flash('failed', "Email này không tồn tại trong hệ thống!");
            return back();
        }
    }

    public function resetPassword($id, $token)
    {
        $user = Users::find($id);
        if ($user->token === $token) {
            return View::make("auth.clients.login.resetpassword");
        } 
        return abort(404);
    }

    public function auhtResetPassword($id, $token, Request $request)
    {
        $validator = $request -> validate([
            'confirm_password' => 'min:6|required_with:password|same:password'
        ], [
            'confirm_password' => 'Mật khẩu xác nhận và mật khẩu phải khớp nhau!'
        ]);
        if($validator) {
            $token = $request -> _token;
            $password = md5($request -> password);
            $result = Users::where('id', $id)->update([
                'password' => $password,
                'confirm_password' => $password,
                'token' => $token
            ]);
            if($result) { 
                Session::flash('success', "Đặt lại mật khẩu thành công, bây giờ bạn có thể đăng nhập");
                return Redirect::route('login.account');
            } else {
                Session::flash('failed', "Đặt lại mật khẩu thất bại, bây giờ bạn có thể đăng nhập");
                return Redirect::route('login.account');
            }
        }
    }
}
