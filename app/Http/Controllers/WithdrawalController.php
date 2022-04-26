<?php

namespace App\Http\Controllers;

use App\Library\Flutterwave;
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
            $flutterwave = new Flutterwave();
            $user = $this->user();
            $wallet = Wallet::where('user_id', $user->unique_id)->first();
            if($wallet->available < $request->amount) return Response::redirectBack('error', 'You do not have sufficient funds for this transaction.');

            $withdrawal = $this->createWithdrawal($user, $request->amount, $request->type ?? 'bank');
            $withdraw = $flutterwave->initiateWithdrawal($withdrawal, $user, $request->amount);

            if(!$withdraw || $withdraw['status'] === 'success') {
                $withdrawal->delete();
                return Response::redirectBack('error', 'Your withdrawal could not be initiated');
            }

            $wallet->available -= $request->amount;
            $wallet->save();

            $withdrawal->status = 'ongoing';

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

                    Notification::send($user, new WithdrawalCompletedNotification($notification));

                    return Response::json(200, 'Withdrawal Completed');
                }
            }
        }
        return Response::json(400);
    }
}
