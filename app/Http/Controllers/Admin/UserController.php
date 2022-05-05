<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\UserActions;
use App\Library\Response;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{
    use UserActions;

    function all(){
        $users = User::all();
        return view('admin.users', [
            'users' => $users
        ]);
    }

    function fetch($id){
        $user = $this->findOrFail($id);
        return view('admin.user-detail.profile', [
            'user' => $user
        ]);
    }

    function edit($id){
        $user = $this->findOrFail($id);
        return view('admin.user-detail.edit', [
            'user' => $user
        ]);
    }

    function status($id){
        try {
            $user = $this->findOrFail($id);
            $user->status = !!$user->status;
            $user->save();

            $status = $user->status ? 'enabled' : 'disabled';
            return redirect()->back()->with('success', "User Status was $status successfully");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function delete($id){
        try {
            $user = $this->findOrFail($id);
            $user->delete();
            return Response::redirect('/users', 'success', 'User was deleted successfully');
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function courses($id){
        try {
            $user = $this->findOrFail($id);
            $courses = User::find($id)->courses;

            return Response::view('admin.user-detail.courses', [
                'courses' => $courses,
                'user' => $user
            ]);
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function withdrawals($id){
        try {
            $user = $this->findOrFail($id);
            $withdrawals = $user->withdrawals();

            return Response::view('admin.user-detail.withdrawals', [
                'withdrawals' => $withdrawals,
                'user' => $user
            ]);
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function payments($id){
        try {
            $user = $this->findOrFail($id);
            $transactions = $user->transactions();

            return Response::view('admin.user-detail.payments', [
                'transactions' => $transactions,
                'user' => $user
            ]);
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function enrolled($id){
        try {
            $user = $this->findOrFail($id);
            $batches = $user->enrolledBatches();

            return Response::view('admin.user-detail.enrollments', [
                'batches' => $batches,
                'user' => $user
            ]);
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function kyc($id){
        try {
            $user = $this->findOrFail($id);
            return Response::view('admin.user-detail.kyc', [
                'user' => $user
            ]);
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }



}
