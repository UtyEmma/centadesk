<?php

namespace App\Http\Traits;

use App\Library\Flutterwave;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Exception;

trait WithdrawalActions{

    function handleWithdrawal($withdrawal_id){
        if(!$withdrawal = Withdrawal::find($withdrawal_id)) throw new Exception('The requested withdrawals does not exist');
        $user = User::find($withdrawal->user_id);
        $wallet = Wallet::where('user_id', $user->unique_id)->first();

        if($withdrawal->type === 'bank') $withdraw = $this->handleBankWithdrawal($withdrawal, $user, $wallet);
        if($withdrawal->type === 'crypto') $withdraw = $this->handleCryptoWithdrawal($withdrawal, $user, $wallet);
        return $withdrawal->refresh();
    }

    function handleBankWithdrawal($withdrawal, $user, $wallet) {
        $flutterwave = new Flutterwave();

        $withdraw = env('RAVE_LIVE')
                        ? $flutterwave->initiateWithdrawal($withdrawal, $user, $withdrawal->amount)
                        : $flutterwave->initiateTestWithdrawal($withdrawal, $user, $withdrawal->amount);

        if(!$withdraw || $withdraw['status'] === 'error') {
            $withdrawal->delete();
            throw new Exception('Your withdrawal failed! '.$withdraw['data']['complete_message']);
        }else{
            $withdrawal->status = 'successful';
            $withdrawal->save();
        }
        return $withdraw;
    }

    function handleCryptoWithdrawal($withdrawal, $user, $wallet){

    }

}
