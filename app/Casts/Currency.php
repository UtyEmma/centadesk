<?php

namespace App\Casts;

use App\Library\Currency as LibraryCurrency;
use App\Models\Currencies;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Facades\Auth;

class Currency implements CastsAttributes{
    function get($model, string $key, $value, array $attributes){
        $currency = request()->cookie('currency') ?? Auth::user()->currency;
        $from = env('DEFAULT_CURRENCY');
        $converted = $value ? LibraryCurrency::convert($value, $from, $currency) : $value;
        return $converted;
    }

    function set($model, string $key, $value, array $attributes){
        return $value;
    }
}
