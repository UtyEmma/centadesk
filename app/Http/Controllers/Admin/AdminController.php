<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller{

    function login(){
        return view('admin.login');
    }

    function authenticate(Request $request){
        if(!Auth::guard('admin')->attempt($request->all())){
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }

        return redirect('/')->with('success', 'Login Successful');
    }

    function home(){
        return view('admin.overview');
    }

}
