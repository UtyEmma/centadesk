<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Response;
use App\Models\User;
use App\Notifications\MentorAccountApprovedNotification;
use App\Notifications\MentorAccountDisapprovedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class MentorController extends Controller{

    function mentors(Request $request){

    }

    function approve(Request $request, $unique_id){
        try {
            $action = (bool) $request->input('action');
            $user = User::find($unique_id);

            $user->kyc_status = $action ? 'approved' : 'disapproved';
            $user->approved = $action;
            $user->save();

            $notification = [
                'dashboard' => env('MAIN_APP_URL').'/me',
                'subject' => $user->kyc_status === 'approved' ? "Congratulations! Your Mentor Signup Request has been approved." : "Sorry! Your Mentor Signup Request was not approved."
            ];

            if($user->kyc_status === 'approved'){
                Notification::send($user, new MentorAccountApprovedNotification($notification));
            }else{
                Notification::send($user, new MentorAccountDisapprovedNotification($notification));
            }


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
