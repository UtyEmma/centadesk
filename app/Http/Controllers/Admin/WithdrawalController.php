<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Flutterwave;
use App\Library\Response;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WithdrawalController extends Controller{


    function sendFunds(Request $request){
        $withdrawal_id = $request->withdrawal_id;
        $withdrawal = Withdrawal::find($withdrawal_id);
        $user = User::find($withdrawal->user_id);
        $wallet = Wallet::where('user_id', $user->unique_id)->first();

        $flutterwave = new Flutterwave();

        $withdraw = env('RAVE_LIVE')
            ? $flutterwave->initiateWithdrawal($withdrawal, $user, $request->amount)
            : $flutterwave->initiateTestWithdrawal($withdrawal, $user, $request->amount);

        if(!$withdraw || $withdraw['status'] === 'error') {
            $withdrawal->delete();
            return Response::redirectBack('error', 'Your withdrawal failed! '.$withdraw['data']['complete_message']);
        }

        return Response::redirectBack('success', '');
    }

}
