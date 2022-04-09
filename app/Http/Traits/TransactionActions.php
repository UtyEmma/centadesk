<?php

namespace App\Http\Traits;

use App\Library\Number;
use App\Models\User;
use App\Models\Wallet;

trait TransactionActions {

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
