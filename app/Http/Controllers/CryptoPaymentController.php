<?php

namespace App\Http\Controllers;

use App\Library\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CryptoPaymentController extends Controller{


    function initiate(){
        $url = env('COINBASE_API_URL').'/charges';

        $response = Http::withHeaders([
            'X-CC-Api-Key' => env('COINBASE_API_KEY'),
            'Content-Type' => 'application/json',
            'X-CC-Version' => '2018-03-22'
        ])->post($url, [
            'name' => 'Libraclass Payment',
            'description' => 'This is the description',
            'pricing_type' => 'fixed_price',
            "local_price" => [
                "amount" => "100.00",
                "currency" => "USD"
            ],
            "metadata" => [
                "reference" => "id_1005",
                "customer_name" => "Satoshi Nakamoto"
            ],
              "redirect_url" => env('MAIN_APP_URL')."/crypto/completed",
              "cancel_url" => env('MAIN_APP_URL')."/crypto/canceled"
        ]);

        if($response->status() !== 201) return Response::redirectBack('error', 'Could not initiate Crypto Payment transaction');
        $res = $response->json();
        $data = $res['data'];

        return redirect()->away($data['hosted_url']);
    }

    function confirmTransaction(){

    }

}
