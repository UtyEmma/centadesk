<?php

namespace App\Http\Controllers;

use App\Library\Flutterwave;
use App\Library\Response;
use App\Library\Token;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WithdrawalController extends Controller{

    function initiate(Request $request){
        try {
            $flutterwave = new Flutterwave();
            $user = $this->user();
            $withdrawal = $this->createWithdrawal($user, $request->amount, $request->type ?? 'bank');
            $withdraw = $flutterwave->initiateWithdrawal($withdrawal, $user, $request->amount);

            if(!$withdraw || $withdraw['status'] === 'success') {
                $withdrawal->delete();
                return Response::redirectBack('error', 'Your withdrawal could not be initiated');
            }

            $wallet = Wallet::where('user_id', $user->unique_id)->first();
            $wallet->available -= $request->amount;
            $wallet->save();

            $withdrawal->status = 'ongoing';

            // Handle Webhooks

            return Response::redirectBack('success', "Your Withdrawal process has been initiated! You will be notified once its completed");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function createWithdrawal($user, $amount, $type){
        $unique_id = Token::unique('users');
        $reference = Token::text(7, 'withdrawals', 'reference');

        $withdrawal = Withdrawal::create([
            'unique_id' => $unique_id,
            'user_id' => $user->unique_id,
            'amount' => $amount,
            'account_no' => $user->account_no,
            'account_name' => $user->account_name ?? "$user->firstname $user->lastname",
            'bank' => $user->bank,
            'type' => $type,
            'wallet_key' => '$wallet->unique_id',
            'reference' => strtolower($reference)
        ]);

        return $withdrawal;
    }
}
