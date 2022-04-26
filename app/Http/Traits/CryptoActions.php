<?php
namespace App\Http\Traits;

use App\Library\Response;
use App\Models\Transaction;
use Illuminate\Support\Facades\Http;

trait CryptoActions{

    function payWithCrypto($transaction, $user, $redirect_url, $desc = ''){
        $url = env('COINBASE_API_URL').'/charges';

        $response = Http::withHeaders([
            'X-CC-Api-Key' => env('COINBASE_API_KEY'),
            'Content-Type' => 'application/json',
            'X-CC-Version' => '2018-03-22'
        ])->post($url, [
            'name' => "Libraclass Course Payment",
            'description' => $desc,
            'pricing_type' => 'fixed_price',
            "local_price" => [
                "amount" => $transaction->amount,
                "currency" => $transaction->currency
            ],
            "metadata" => [
                "reference" => $transaction->reference,
                "customer_name" => "$user->firstname $user->lastname"
            ],
              "redirect_url" => $redirect_url."&status=initialized",
              "cancel_url" => $redirect_url."&status=cancelled"
        ]);


        if($response->status() !== 201)
                return Response::redirectBack('error', 'Could not initiate Crypto Payment transaction');

        $res = $response->json();
        $transaction->reference = $res['data']['code'];
        $transaction->save();

        return Response::redirect($res['data']['hosted_url']);
    }

    function verifyCryptoPayment($request){
        if($request->status === 'initialized') return Response::redirectBack('/wallet', 'Your Payment has been initiated is pending');
        if($request->status === 'cancelled') return Response::redirect('/wallet', 'error', 'Your Payment was cancelled');
        return Response::redirectBack('error', 'Your Payment status could not be determined please contact Support');
    }

}
