<?php

namespace App\Http\Traits;

use App\Library\Token;
use App\Models\Currencies;
use Exception;
use Illuminate\Support\Facades\Http;

trait CurrencyActions {

    function createCurrencies (){
        $currencies = Currencies::all();
        if(count($currencies) > 0) return false;

        $response = Http::get(env('EXCHANGERATE_API_URL').'/symbols');
        if(!$response->ok()) throw new Exception('Exchange Rate update Failed');

        $response = $response->json();
        $symbols = $response['symbols'];

        foreach ($symbols as $symbol) {
            $unique_id = Token::unique('currencies');
            $base = $symbol['code'] === "USD";


            Currencies::create([
                'unique_id' => $unique_id,
                'symbol' => $symbol['code'],
                'name' => $symbol['description'],
                'base' => $base
            ]);
        }
        return true;
    }
}
