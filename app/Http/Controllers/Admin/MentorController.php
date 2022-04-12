<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Response;
use App\Models\User;
use Illuminate\Http\Request;

class MentorController extends Controller{

    function approve(Request $request, $unique_id){
        try {
            $action = (bool) $request->input('action');
            $user = User::find($unique_id);

            $user->kyc_status = $action ? 'approved' : 'disapproved';
            $user->approved = $action;
            $user->save();

            return Response::redirectBack('success', "The Mentor has been approved successfully");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function verify($id){
        if(!$user = User::find($id)) return Response::redirectBack('error', 'User does not exist');
        if($user->role !== 'mentor') return Response::redirectBack('error', 'User is not a Mentor and cannot be verified');
        $user->is_verified = 'verified';
        return Response::redirectBack('success', 'User Verified Successfully');
    }
}
