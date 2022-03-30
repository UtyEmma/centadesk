<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\UserActions;
use App\Library\Response;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller{
    use UserActions;

    function facebookLogin (){
        return Socialite::driver('facebook')->redirect();
    }

    function facebookCallback(){
        $user = Socialite::driver('facebook')->user();

        return print_r($user);
    }

    function googleLogin(){
        return Socialite::driver('google')->redirect();
    }

    function googleCallback(){
        try {
            $user = Socialite::driver('google')->user();
            $data = $user->user;

            if($user){
                $user->firstname = $data['given_name'];
                $user->lastname = $data['family_name'];
                $user->avatar = $data['picture'];

                $user = $this->findOrCreate($user);

                Auth::login($user);
                return Response::intended(RouteServiceProvider::LEARNING_CENTER);
            }else{
                throw new Exception("There was an Error");
            }
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

}
