<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthenticatedSessionController extends Controller{

    public function create(Request $request){
        return view('auth.login', [
            'data' => $this->app_data()
        ]);
    }


    public function store(LoginRequest $request){
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();
        return redirect()->intended($request->redirect ?? RouteServiceProvider::LEARNING_CENTER)->withCookie(cookie('currency', $user->currency));
    }


    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
