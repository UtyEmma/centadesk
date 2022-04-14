<?php

namespace App\Library;

use App\Models\Withdrawal;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

class Flutterwave {

    private $url;
    private $key;

    function __construct(){
        $this->url = env('RAVE_API_BASE_URL');
        $this->key = env('RAVE_SECRET_KEY');
    }

    function initiateWithdrawal($withdrawal, $user, $amount){
        $response = Http::withToken($this->key)->post($this->url.'/transfers', [
            'account_bank' => $user->bank,
            'account_number' => $user->account_no,
            'amount' => $amount,
            'narration' => 'Payout from Libraclass',
            'currency' => 'NGN',
            'reference' => $withdrawal->reference,
            'callback_url' => '',
            'debit_currency' => 'NGN'
        ]);

        if(!$response->ok() || ($response->status() !== 200 || 201)) return false;
        return $response->json();
    }

}
