<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositRequest;
use App\Http\Traits\CryptoActions;
use App\Http\Traits\TransactionActions;
use App\Library\Response;
use App\Library\Token;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Wallet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DepositController extends Controller{
    use TransactionActions, CryptoActions;

    public function initiate (DepositRequest $request){
        try {
            $unique_id = Token::unique('deposits');
            $reference = Token::text(6, 'deposits', 'reference');
            $user = $this->user();

            $deposit = Deposit::create([
                'unique_id' => $unique_id,
                'user_id' => $user->unique_id,
                'type' => $request->type,
                'reference' => $reference,
                'amount' => $request->amount,
                'currency' => request()->cookie('currency')
            ]);

            $redirect_url = env('MAIN_APP_URL')."/wallet/verify?method=$request->type&ref=$deposit->unique_id";

            if($request->type === 'crypto') return $this->payWithCrypto($deposit, $user, $redirect_url);
            if($request->type === 'bank') return $this->initializeCardDeposit($deposit, $user, $redirect_url);

            throw new Exception('Invalid Payment Method Selected', 400);

        } catch (\Throwable $th) {
            return Response::redirectBack(400, $th->getMessage());
        }
    }

    function initializeCardDeposit($deposit, $user, $redirect_url){
        $url = $this->initializeFlutterwave($deposit, $user, $redirect_url);
        return redirect()->away($url);
    }

    function verifyCardDeposit($request){
        $deposit = Deposit::find($request->ref);
        $tx_ref = $deposit->reference;
        $failed_link = "/wallet";

        if($request->status === 'successful'){
            $transaction_id = $request->transaction_id;
            $deposit = Deposit::where('reference', $tx_ref)->first();
            $transaction = $this->verifyDepositStatus($deposit, $transaction_id);
            $success_link = "/wallet";

            if(!$transaction['status'])
                    return Response::redirect($failed_link, 'error', $transaction['message']);

            $transaction = $transaction['transaction'];
            $user = User::find($transaction->user_id);

            $wallet = Wallet::where('user_id', $user->unique_id)->first();
            $wallet->deposits += $deposit->amount;
            $wallet->save();

            return Response::redirect($success_link, 'success', 'Your deposit was successful');
        }

        if($deposit = Deposit::where('reference', $tx_ref)->first()) $deposit->delete();
        return Response::redirect($failed_link, 'error', "Your Payment attempt was cancelled");
    }

    function verifyDepositStatus($deposit, $transaction_id){
        $response = Http::withHeaders([
            'Authorization' => env('RAVE_SECRET_KEY')
        ])->get("https://api.flutterwave.com/v3/transactions/".$transaction_id."/verify");

        if($response->ok() && $response->status() === 200) {
            $res = $response->json();

            $status = $res['data']['status'];
            $tx_ref = $res['data']['tx_ref'];

            if($status === 'successful'){
                $deposit->status = 'completed';
                $deposit->save();

                return [
                    'status' => true,
                    'transaction' => $deposit,
                    'code' => 200
                ];
            }

            return [
                'status' => false,
                'message' => 'Your Transaction was not Successful',
                'code' => 400
            ];
        }

        return [
            'status' => false,
            'message' => "We could not confirm your transaction status at the moment",
            'code' => 500
        ];
    }

    public function verify(Request $request){
        if($request->method === 'crypto') return $this->verifyCryptoPayment($request);
        if($request->method === 'bank') return $this->verifyCardDeposit($request);
    }
}
