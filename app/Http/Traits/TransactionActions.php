<?php

namespace App\Http\Traits;

use App\Library\Number;
use App\Library\Token;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;

trait TransactionActions {

    function createTransaction($data){
        $unique_id = Token::unique('transactions');
        $reference = Token::random();

        $transaction = Transaction::create([
            'unique_id' => $unique_id,
            'reference' => $reference,
            'amount' => $data->amount,
            'user_id' => $data->user_id
        ]);

        return $transaction;
    }

    function handleReferrerPayout ($user, $amount){
        if ($user->referrer_id) {
            if($referrer = User::where('referrer_id', $user->referrer_id)->first()) {
                $bonus = env('REFERAL_BONUS');
                $wallet = $referrer->wallet;
                $wallet->referrals += Number::percentageValue($bonus, $amount);
                $wallet->save();
            }
        }
    }

}
