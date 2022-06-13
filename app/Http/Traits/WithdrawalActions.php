<?php

namespace App\Http\Traits;

use App\Library\Flutterwave;
use App\Library\Notifications;
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
        // if($withdrawal->type === 'crypto') $withdraw = $this->handleCryptoWithdrawal($withdrawal, $user, $wallet);
        // return ;
    }

    function handleBankWithdrawal($withdrawal, $user, $wallet) {
        $flutterwave = new Flutterwave();

        $withdraw = env('RAVE_LIVE')
                        ? $flutterwave->initiateWithdrawal($withdrawal, $user, $withdrawal->amount)
                        : $flutterwave->initiateTestWithdrawal($withdrawal, $user, $withdrawal->amount);

        if(!$withdraw || $withdraw['status'] === 'error') {
            $withdrawal->status = 'failed';
            $withdrawal->save();

            $wallet = $user->wallet;
            $wallet->payouts -= $withdrawal->amount;
            $wallet->available += $withdrawal->amount;
            $wallet->save();

            $message = [
                'greeting' => "Hi, $user->firstname",
                Notifications::parse('text', 'Your withdrawal could not be completed!'),
                Notifications::parse('text', "<strong>Reason:</strong> ".$withdraw['data']['complete_message']),
                Notifications::parse('text', 'Please ensure that your bank account details are correct and up to date then initiate the withdrawal again.'),
                Notifications::parse('text', 'Please click the link below to reach out to our Support team if you have any complaints or to update your account details.'),
                Notifications::parse('action', [
                    'link' => "mailto:".env('LIBRACLASS_EMAIL'),
                    'action' => "Contact Support"
                ]),
                Notifications::parse('text', "Thank you for staying with us!"),
            ];

            $notification = Notifications::builder("Your withdrawal Failed!", $message);
            Notifications::send($user, $notification, ['mail']);

            throw new Exception('Withdrawal Could Not be completed! '.$withdraw['data']['complete_message']);
        }else{
            $withdrawal->status = 'successful';
            $withdrawal->save();

            $wallet->payouts -= $withdrawal->amount;
            $wallet->save();
        }
        return $withdraw;
    }

    function handleCryptoWithdrawal($withdrawal, $user, $wallet){

    }

}
