<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller{

    function login(){
        return view('admin.login');
    }

    function authenticate(Request $request){
        if(!Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }

        $request->session()->regenerate();

        return Response::intended('/', 'success', 'Login Successful');
    }

    function home(){
        $mentor_requests = User::where([
            'role' => 'mentor',
            'kyc_status' => 'pending',
            'approved' => false
        ])->get();

        return view('admin.overview', [
            'mentor_requests' => $mentor_requests
        ]);
    }

    function logout(Request $request){
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return Response::redirect('/login', 'success', 'Logout Successful');
    }

}
