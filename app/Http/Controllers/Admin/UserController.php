<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\UserActions;
use App\Library\Notifications;
use App\Library\Response;
use App\Models\Bank;
use App\Models\User;
use App\Models\Wallet;
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
        $banks = Bank::all();
        return view('admin.user-detail.edit', [
            'user' => $user,
            'banks' => $banks
        ]);
    }

    function status($id){
        $user = $this->findOrFail($id);
        $user->status = !$user->status;
        $user->save();

        $status = $user->status ? 'enabled' : 'disabled';
        $message = [
            'greeting' => "Hi, $user->firstname",
            Notifications::parse('text', $user->status ? 'Your '.env('APP_NAME').' account has been suspended!' : 'Your '.env('APP_NAME').' account has been restored!'),
            Notifications::parse('text', $user->status ? 'This is because we have noticed some suspicious activity or a violation of our terms and conditions for our users on your account. Please note that your activity on our platform will be restricted during this period!' : 'You can now proceed to enjoy the full features and benefits of our platform.'),
            Notifications::parse('text', $user->status ? 'Please click the link below to reach out to our Support team if you have any complaints or objections to our decision.' : 'Please ensure that you read and abide duly to the terms sand conditionsa for members of our community.'),
            Notifications::parse('action', [
                'link' => "mailto:".env('LIBRACLASS_EMAIL'),
                'action' => "Contact Support"
            ]),
            Notifications::parse('text', "Thank you for staying with us!"),
        ];

        $notification = Notifications::builder($user->status ? "Your ".env('APP_NAME')." account has been restored!" : "Your ".env('APP_NAME')." account has been suspended!", $message);
        Notifications::send($user, $notification, ['mail', 'database']);

        return redirect()->back()->with('success', "User Status was $status successfully");
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

    function freezeWallet(Request $request, $id){
        if(!$request->has('action'))
                return abort(400, 'Invalid Request!');

        if(!$user = User::find($id))
                return Response::redirectBack('error', "The User Does Not Exist");

        if(!$wallet = Wallet::where('user_id', $id)->first())
                return Response::redirectBack('error', "Could Not Find Wallet Belonging to this User");

        switch ($request->action) {
            case 'true':
                $wallet->status = true;
                break;
                case 'false':
                    $wallet->status = false;
                    break;
                default:
                    return Response::redirectBack('error', "Invalid Action Parameter!");
                break;
        }

        $wallet->save();

        $message = [
            'greeting' => "Hi, $user->firstname",
            Notifications::parse('text', 'We have suspended withdrawals from your '.env('APP_NAME').' wallet, pending a review of your account!'),
            Notifications::parse('text', 'Please note that this decision was made based on a suspicious activity on your account or based on complaints made by your Students. Your funds are still available on your account and will be made available to you once our review is completed.'),
            Notifications::parse('text', 'Please reach out to our Support Team if you feel this could have been a mistake or if you have any complaints.'),
            Notifications::parse('action', [
                'link' => "mailto:".env('LIBRACLASS_EMAIL'),
                'action' => "Contact Support"
            ]),
            Notifications::parse('text', "Thank you for staying with us!"),
        ];

        $notification = Notifications::builder("Withdrawals from your Wallet has been suspended!", $message);
        Notifications::send($user, $notification, ['mail']);

        return Response::redirectBack('success', 'Batch Payments Suspended');
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
