<?php

namespace App\Casts;

use App\Library\Currency as LibraryCurrency;
use App\Models\Currencies;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Currency implements CastsAttributes{

    function get($model, string $key, $value, array $attributes){
        $currency = request()->cookie('currency');
        $converted = $value ? LibraryCurrency::convert($value, $model->currency, $currency) : $value;
        return $converted;
    }

    function set($model, string $key, $value, array $attributes){
        return $value;
    }

}
