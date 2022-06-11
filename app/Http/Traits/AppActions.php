<?php

namespace App\Http\Traits;

use App\Models\Category;
use App\Models\Currencies;
use Illuminate\Http\Request;

trait AppActions{

    function appData(Request $request){
        $currencies = Currencies::all();
        $currency = $request->cookie('currency');
        $categories = Category::where('status', true)->orderByDesc('students')->limit(6)->get();

        $data = [
            'currencies' => $currencies,
            'currency' => $currency,
            'categories' => $categories
        ];
        return $data;
    }



}
