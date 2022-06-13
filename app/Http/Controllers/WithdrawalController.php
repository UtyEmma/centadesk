<?php

namespace App\Http\Controllers;

use App\Library\Currency;
use App\Library\Flutterwave;
use App\Library\Notifications;
use App\Library\Response;
use App\Library\Token;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdrawal;
use App\Notifications\WithdrawalCompletedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;

class WithdrawalController extends Controller{

    function initiate(Request $request){
        try {
            $user = $this->user();
            $wallet = Wallet::where('user_id', $user->unique_id)->first();

            if(!$wallet->status)
                    return Response::redirectBack('error', "You cannot make a withdrawal because your account is under review!");

            if($wallet->available < $request->amount)
                    return Response::redirectBack('error', 'You do not have sufficient funds for this transaction.');

            $withdrawal = $this->createWithdrawal($user, $request->amount, $request->type ?? 'bank');

            $wallet->available -= $request->amount;
            $wallet->payouts += $request->amount;
            $wallet->save();

            $message = [
                Notifications::parse('image', asset('images/email/kyc-pending.png')),
                Notifications::parse('text', 'Your Withdrawal has been initiated! You will be notified when the process is completed.'),
                Notifications::parse('text', 'If you have any problems, please contact support at '.env('LIBRACLASS_EMAIL'))
            ];


            $notification = Notifications::builder("Your Withdrawal has been initiated!", $message);
            Notifications::send($user, $notification, ['mail', 'database']);


            return Response::redirectBack('success', "Your Withdrawal process has been initiated! You will be notified when it is completed");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function createWithdrawal($user, $amount, $type){
        $unique_id = Token::unique('users');
        $reference = $this->newRef('withdrawals', 'reference');
        $amount = Currency::convertUserCurrencyToDefault($amount);

        $withdrawal = Withdrawal::create([
            'unique_id' => $unique_id,
            'user_id' => $user->unique_id,
            'amount' => $amount,
            'account_no' => $user->account_no,
            'account_name' => $user->account_name ?? "$user->firstname $user->lastname",
            'bank' => $user->bank,
            'type' => $type,
            'currency' => Currency::user(),
            'wallet_key' => $type === 'crypto' ? $user->crypto_address : '',
            'reference' => $reference
        ]);

        return $withdrawal;
    }

    function newRef($table, $column){
        $reference = strtolower(Token::text(7, $table, $column));
        return env('RAVE_LIVE') ? $reference : $reference.'_PMCKDU_1';
    }

    function updateStatus(Request $request){
        $data = $request->data['tx_ref'];
        $ref = $data['tx_ref'];

        $withdrawal = Withdrawal::where('reference', $ref)->first();

        if($data['status'] === 'successful'){

            $response = Http::withHeaders([
                'Authorization' => env('RAVE_SECRET_KEY')
            ])->get("https://api.flutterwave.com/v3/transactions/".$data['id']."/verify");

            if($response->ok() && $response->status() === 200) {
                $res = $response->json();
                $status = $res['data']['status'];
                $tx_ref = $res['data']['tx_ref'];

                if($status === 'successful'){
                    $withdrawal->status = 'successful';
                    $withdrawal->save();

                    $user = User::find($withdrawal->user_id);

                    $notification = [
                        'subject' => "Your withdrawal has been completed successfully"
                    ];

                    try {
                        Notification::send($user, new WithdrawalCompletedNotification($notification));
                    } catch (\Throwable $th) {}

                    return Response::json(200, 'Withdrawal Completed');
                }
            }
        }
        return Response::json(400);
    }
}
