<?php
namespace App\Http\Traits;

use App\Library\Response;
use App\Models\Transaction;
use Illuminate\Support\Facades\Http;

trait CryptoActions{

    function payWithCrypto($transaction, $user, $redirect_url, $batch, $course){
        $url = env('COINBASE_API_URL').'/charges';

        $response = Http::withHeaders([
            'X-CC-Api-Key' => env('COINBASE_API_KEY'),
            'Content-Type' => 'application/json',
            'X-CC-Version' => '2018-03-22'
        ])->post($url, [
            'name' => "Libraclass Course Payment",
            'description' => "Enrollment for $batch->title of $course->name",
            'pricing_type' => 'fixed_price',
            "local_price" => [
                "amount" => $transaction->amount,
                "currency" => $transaction->currency
            ],
            "metadata" => [
                "reference" => $transaction->reference,
                "customer_name" => "$user->firstname $user->lastname"
            ],
              "redirect_url" => "$redirect_url?ref=$transaction->unique_id",
              "cancel_url" => "$redirect_url?ref=$transaction->unique_id"
        ]);


        if($response->status() !== 201)
                return Response::redirectBack('error', 'Could not initiate Crypto Payment transaction');

        $res = $response->json();
        $transaction->reference = $res['data']['code'];
        $transaction->save();

        return Response::redirect($res['data']['hosted_url']);
    }

    function verifyCryptoPayment($request, $batch_id){
        return print_r($request);
    }

}
