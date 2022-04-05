<?php

namespace App\Http\Traits;

use App\Models\Currencies;
use Illuminate\Http\Request;
use Stidges\CountryFlags\CountryFlag;

trait AppActions{

    function appData(Request $request){
        $currencies = Currencies::all();
        $flags = new CountryFlag();
        $currency = $request->cookie('currency');

        $data = [
            'currencies' => $currencies,
            'flags' => $flags,
            'currency' => $currency
        ];
        return $data;
    }



}
