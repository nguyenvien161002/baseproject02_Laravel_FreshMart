<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Service\Exception;
use App\Models\Users;
use Illuminate\Support\Carbon;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\A_AccountsUserController;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google') -> redirect();
    }

    public function handleCallback()
    {
        try {
            $googleUser = Socialite::driver('google') -> user();
            $check = Users::where('email', $googleUser -> email) -> where('id_authorization', 5) -> get() -> toArray();
            $id = A_AccountsUserController::randomCode();
            $token = csrf_token();
            if(!$check) {
                $result = Users::insert([
                    'id' => $id,
                    'fullname' => $googleUser -> name,
                    'email' => $googleUser -> email,
                    'avatar' => $googleUser -> avatar,
                    'state' => 1,
                    'token' => $token,
                    'id_authorization' => 5,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                if($result) {
                    Session::put("is_login", true);
                    Session::put("id_authorization", 5);
                    Session::put("id", $id);
                    Session::put("fullname", $googleUser -> name);
                    Session::put("email", $googleUser -> email);
                    Session::put("avatar", $googleUser -> avatar);
                    return Redirect::route('home');
                } else {
                    Session::flash('is_login', false);
                    return Redirect::route('login');
                }
            } else {
                Session::put("is_login", true);
                Session::put("id_authorization", 5);
                foreach($check as $key => $value) { 
                    Session::put("id", $value['id']);
                    Session::put("fullname", $value['fullname']);
                    Session::put("email", $value['email']);
                    Session::put("avatar", $value['avatar']);
                }
                return Redirect::route('home');
            }
        } catch (Exception $e) {
            return 'error';
        }
    }

}
