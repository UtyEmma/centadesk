<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Analytics;
use App\Library\Response;
use App\Library\Token;
use App\Models\Admin;
use App\Models\Stat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller{
    use Analytics;

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

        $verification_requests = User::where([
            'role' => 'mentor',
            'kyc_status' => 'pending',
            'approved' => false,
            'is_verified' => 'pending'
        ])->get();

        $stats = $this->compileStats();

        return view('admin.overview', [
            'mentor_requests' => $mentor_requests,
            'verification_requests' => $verification_requests,
            'stats' => $stats
        ]);
    }

    function logout(Request $request){
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return Response::redirect('/login', 'success', 'Logout Successful');
    }

    function register(){
        $admins = Admin::all();

        return Response::view('admin.admins', [
            'admins' => $admins
        ]);
    }

    function create(Request $request){
        $unique_id = Token::unique('admins');

        if(!$admin = Admin::where('email', $request->email)->first()){
            Admin::create([
                'unique_id' => $unique_id,
                'name' => $$request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);
        }

        return Response::redirectBack('success', "Admin Created");
    }

    function status($id){
        try {
            $admin = Admin::find($id);
            $user = Auth::guard('admin')->user();
            if($user->unique_id === $id) return Response::redirectBack('error', 'You cannot change your own account Status');
            $admin->status = !!$admin->status;
            $admin->save();

            $status = $admin->status ? 'Unsuspended' : 'Suspended';
            return redirect()->back()->with('success', "Admin was $status");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function delete($id){
        try {
            $admin = Admin::find($id);
            $user = Auth::guard('admin')->user();
            $admins = Admin::all();
            $super_admins = Admin::where('role', 'super-admin')->get();

            if(count($admins) < 2 ||  $super_admins->isEmpty())
                    return Response::redirectBack('error', 'There must be at least one Super administrator on the App');

            if($user->unique_id === $id)
                    return Response::redirectBack('error', 'You cannot change your own account Status');

            $admin->delete();
            return Response::redirectBack('success', 'User was deleted successfully');
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }


}
