<?php

namespace App\Library;

use Illuminate\Support\Facades\Http;

class Flutterwave {

    private $url;
    private $key;

    function __construct(){
        $this->url = env('RAVE_API_BASE_URL');
        $this->key = env('RAVE_SECRET_KEY');
    }

    function initiateWithdrawal(){
        $response = Http::withToken($this->key)->post($this->url.'/transfers', [
            'account_bank' => '044',
            'account_number' => '0690000031',
            'amount' => '20000',
            'narration' => 'Payout from Libraclass',
            'currency' => 'NGN',
            'reference' => '',
            'callback_url' => '',
            'debit_currency' => 'NGN'
        ]);

        return $response->json();
    }

}
