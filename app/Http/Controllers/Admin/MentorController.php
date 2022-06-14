<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Notifications;
use App\Library\Response;
use App\Models\User;
use App\Notifications\MentorAccountApprovedNotification;
use App\Notifications\MentorAccountDisapprovedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class MentorController extends Controller{

    function requests(Request $request){
        $mentor_requests = User::where([
            'role' => 'mentor',
            'kyc_status' => 'pending',
            'approved' => false
        ])->get();

        return Response::view('admin.mentor-requests', [
            'mentor_requests' => $mentor_requests
        ]);
    }

    function verificationRequests (){
        $verification_requests = User::where([
            'role' => 'mentor',
            'kyc_status' => 'approved',
            'approved' => true,
            'is_verified' => 'requested'
        ])->get();

        return Response::view('admin.verification-requests', [
            'verification_requests' => $verification_requests
        ]);
    }

    function approve(Request $request, $unique_id){
        try {
            $action = (bool) $request->input('action');
            $user = User::find($unique_id);

            $user->kyc_status = $action ? 'approved' : 'pending';
            if(!$action) $user->role = 'user';
            $user->approved = $action;
            $user->save();

            $message = [
                Notifications::parse('image', asset('images/email/kyc-success.png')),
                'greeting' => "Hi, $user->firstname",
                Notifications::parse('text', $user->kyc_status === 'approved' ? 'After due consideration of your application, we are pleased to inform you that your application to become a Mentor on '.env('APP_NAME').' has been approved!' : 'After due consideration of your application, we regret to inform you that your application to become a Mentor on '.env('APP_NAME').' could not be approved at this time!'),
                Notifications::parse('text', $user->kyc_status === 'approved' ? 'You can now gain access to your Mentor dashboard by clicking the link below.': 'But not to worry, we encourage you to continue building your portfolio and profile and re-apply in the future when you feel confident.'),
                $user->kyc_status === 'approved' ? Notifications::parse('action', [
                    'link' => env('MAIN_APP_URL')."/me",
                    'action' => "My Dashboard"
                ]) : '',
                Notifications::parse('text', $user->kyc_status === 'approved' ? "We cannot wait to see the amazing Sessions you will create as a Mentor on our platform." : "Thank you for your interest in joining our platform. You can still join amazing sessions by top professionals who are Mentors on our platform by clicking the link below"),
                $user->kyc_status === 'approved' ? '' : Notifications::parse('action', [
                    'link' => env('MAIN_APP_URL')."/sessions",
                    'action' => "Find a Session"
                ])
            ];

            $notification = Notifications::builder($user->kyc_status === 'approved' ? "Congratulations! $user->firstname, Your Mentor Application was Approved!" : "Your Mentor Application was not approved at this time!", $message);
            Notifications::send($user, $notification, ['mail']);


            return Response::redirectBack('success', "The Mentor has been approved successfully");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function verify(Request $request, $id){
        if(!$user = User::find($id)) return Response::redirectBack('error', 'User does not exist');
        if($user->role !== 'mentor') return Response::redirectBack('error', 'User is not a Mentor and cannot be verified');
        $user->is_verified = $request->status ? 'verified' : 'unverified';
        $user->save();
        return Response::redirectBack('success', 'Verification Status Updated');
    }
}
