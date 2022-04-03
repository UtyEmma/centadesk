<?php

namespace App\Library;

use App\Models\Currencies;

class Currency {

    static function convert($amount, $from, $to=""){
        $to = $to ?? request()->cookie('currency');

        if($from === 'USD' && $to === 'USD') return $amount;

        $from_currency = Currencies::where('symbol', $from)->first();
        $to_currency = Currencies::where('symbol', $to)->first();

        $from_rate = $from_currency->rate;
        $to_rate = $to_currency->rate;

        $usd_value = self::convertToUSD($from_rate, $amount);
        $to_value = self::convertFromUSD($to_rate, $usd_value);

        return ceil($to_value);
    }

    static function convertToUSD($rate, $amount){
        return $amount / $rate;
    }


    static function convertFromUSD($rate, $amount){
        return $amount * $rate;
    }

}
