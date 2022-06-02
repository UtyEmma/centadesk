<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\UserActions;
use App\Library\Response;
use App\Library\Str;
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
        $data = Socialite::driver('facebook')->user();

        if($data){

            $user = collect([]);
            $nameArray = Str::of($data->getName())->explode(' ');

            $user->firstname = $nameArray[0];
            $user->lastname = $nameArray[1];
            $user->avatar = $data->getAvatar();
            $user->email = $data->getEmail();

            $newUser = $this->findOrCreate($user);
            Auth::login($newUser, true);

            return response()->redirectToIntended(RouteServiceProvider::LEARNING_CENTER)
                                ->withCookie(cookie('currency', $newUser->currency));
        }else{
            Response::redirectBack('error', "We could not fetch any user data from Facebook");
        }
    }

    function googleLogin(){
        return Socialite::driver('google')->redirect();
    }


    function googleCallback(){
        $user = Socialite::driver('google')->user();
        $data = $user->user;

        if($user){
            $user->firstname = $data['given_name'];
            $user->lastname = $data['family_name'];
            $user->avatar = $data['picture'];

            $user = $this->findOrCreate($user, 'social');
            Auth::login($user);

        return response()->redirectToIntended(RouteServiceProvider::LEARNING_CENTER)
                            ->withCookie(cookie('currency', $user->currency));
        }else {
            Response::redirectBack('error', "Could not fetch user data from Google");
        }
    }
}
