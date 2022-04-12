<?php

namespace App\Http\Controllers;

use App\Library\Response;
use App\Library\Token;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DepositController extends Controller{

    public function initiate (Request $request){
        try {
            $unique_id = Token::unique('deposits');
            $reference = Token::text(6, 'deposits', 'reference');

            $deposit = Deposit::create([
                'unique_id' => $unique_id,
                'user_id' => $request->user_id,
                'type' => $request->type,
                'reference' => $reference,
                'amount' => $request->amount,
                'currency' => $request->currency
            ]);

            return Response::json(200, 'Deposit Created', [
                'deposit' => $deposit
            ]);

        } catch (\Throwable $th) {
            return Response::json(400, $th->getMessage());
        }
    }

    public function verify($id){
        try {

            $response = Http::withHeaders([
                'Authorization' => env('RAVE_SECRET_KEY')
                ])->get("https://api.flutterwave.com/v3/transactions/".$id."/verify");

                if($response->ok() && $response->status() === 200) {
                    $res = $response->json();

                    $status = $res['data']['status'];
                    $tx_ref = $res['data']['tx_ref'];

                if($status === 'successful' && $deposit = Deposit::where('reference', $tx_ref)->first()){
                    $deposit->status = 'completed';
                    $deposit->save();

                    $user = User::find($deposit->user_id);
                    $wallet = Wallet::where('user_id', $user->unique_id)->first();
                    $wallet->deposits += $deposit->amount;
                    $wallet->save();

                    return Response::json(200, "Your Transaction was successful", [
                        'deposit' => $deposit
                    ]);
                }

                return Response::json(400, 'Your Transaction was not Successful');
            }

            return Response::json(400, 'Your Transaction was not Successful', [
                'res' => $response->json()
            ]);
        } catch (\Throwable $th) {
            return Response::json(400, $th->getMessage());
        }
    }
}
