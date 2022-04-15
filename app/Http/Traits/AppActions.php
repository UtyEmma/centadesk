<?php

namespace App\Http\Traits;

use App\Models\Category;
use App\Models\Currencies;
use Illuminate\Http\Request;
use Stidges\CountryFlags\CountryFlag;

trait AppActions{

    function appData(Request $request){
        $currencies = Currencies::all();
        $flags = new CountryFlag();
        $currency = $request->cookie('currency');
        $categories = Category::where('status', true)->orderByDesc('students')->limit(6)->get();

        $data = [
            'currencies' => $currencies,
            'flags' => $flags,
            'currency' => $currency,
            'categories' => $categories
        ];
        return $data;
    }



}
