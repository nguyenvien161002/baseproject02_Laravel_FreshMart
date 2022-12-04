<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Service\Exception;
use App\Models\UsersGG;
use Illuminate\Support\Carbon;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\A_AccountsUserController;

class FacebookAuthController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook') -> redirect();
    }

    public function handleCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook') -> user();
            return Redirect::route('home');
        } catch (Exception $e) {
            return 'error';
        }
    }
}
