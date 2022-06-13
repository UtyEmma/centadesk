<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\WithdrawalActions;
use App\Jobs\ProcessWithdrawals;
use App\Library\Flutterwave;
use App\Library\Notifications;
use App\Library\Response;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Exception;
use Illuminate\Http\Request;

class WithdrawalController extends Controller{
    use WithdrawalActions;

    function sendFunds(Request $request){
        try {
            if(!$withdrawal = Withdrawal::find($request->withdrawal_id)) throw new Exception('The Requested withdrawal was not found');
            $this->handleWithdrawal($request->withdrawal_id);
            $user = User::find($withdrawal->user_id);

            $message = [
                'greeting' => "Hi, $user->firstname",
                Notifications::parse('text', 'Your withdrawal has been approved!'),
                Notifications::parse('text', 'Your funds are on the way. You It will be sent into the Bank Account provided on your profile.'),
                Notifications::parse('text', 'Please click the link below to reach out to our Support team if you have any complaints or have not received the funds.'),
                Notifications::parse('action', [
                    'link' => "mailto:".env('LIBRACLASS_EMAIL'),
                    'action' => "Contact Support"
                ]),
                Notifications::parse('text', "Thank you for staying with us!"),
            ];

            $notification = Notifications::builder("Your funds are on the way!", $message);
            Notifications::send($user, $notification, ['mail']);
            return Response::redirectBack('success', 'Withdrawal Completed');
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function show(Request $request){
        if($request->type === 'requests'){
            $withdrawals = Withdrawal::where('status', 'pending')
                                        ->with('user')
                                        ->paginate(env('ADMIN_PAGINATION_COUNT'));
        }else{
            $withdrawals = Withdrawal::join('users', 'users.unique_id', 'withdrawals.user_id')
                                        ->join('wallets', 'withdrawals.user_id', 'wallets.user_id')
                                        ->select('withdrawals.*', 'wallets.available', 'users.firstname', 'users.lastname', 'users.avatar')
                                        ->paginate(env('ADMIN_PAGINATION_COUNT'));
        }

        return Response::view('admin.withdrawals', [
            'withdrawals' => $withdrawals
        ]);
    }

    function withdrawalRequests(){
        $withdrawals = Withdrawal::where('status', 'pending')
                                    ->with('user.wallet')
                                    ->paginate(env('ADMIN_PAGINATION_COUNT'));

        // dd($withdrawals);

        return Response::view('admin.withdrawal-requests', [
            'withdrawals' => $withdrawals
        ]);
    }

    function delineWithdrawal(Request $request){
        try {
            if(!$withdrawal = Withdrawal::find($request->withdrawal_id)) throw new Exception('The Requested withdrawal was not found');
            $withdrawal->status = 'declined';
            $withdrawal->save();

            $user = User::find($withdrawal->user_id);

            $wallet = $user->wallet;
            $wallet->payouts -= $withdrawal->amount;
            $wallet->available += $withdrawal->amount;
            $wallet->save();

            $message = [
                'greeting' => "Hi, $user->firstname",
                Notifications::parse('text', 'Your withdrawal request could not be fulfilled at this time.'),
                Notifications::parse('text', 'Please click the link below to reach out to our Support team if you have any complaints or have not received the funds.'),
                Notifications::parse('action', [
                    'link' => "mailto:".env('LIBRACLASS_EMAIL'),
                    'action' => "Contact Support"
                ]),
                Notifications::parse('text', "Thank you for staying with us!"),
            ];

            $notification = Notifications::builder("Your withdrawal request was declined!", $message);
            Notifications::send($user, $notification, ['mail']);
            return Response::redirectBack('success', 'Withdrawal Declined');
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }



}
