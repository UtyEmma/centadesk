<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Traits\UserActions;
use App\Library\Token;
use App\Models\User;
use App\Models\Wallet;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller{
    use UserActions;

    public function create(){
        return view('auth.register', [
            'data' => $this->app_data()
        ]);
    }

    public function store(RegisterRequest $request){
        $user = $this->newUser($request);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::LEARNING_CENTER);
    }
}
