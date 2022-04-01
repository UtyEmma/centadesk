<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Stidges\CountryFlags\CountryFlag;

class Controller extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function user (){
        $user = Auth::user();
        return User::find($user->unique_id);
    }

    protected function app_data(){
        $currencies = Currencies::all();
        $flags = new CountryFlag;
        $data = [
            'currencies' => $currencies,
            'flags' => $flags
        ];
        return $data;
    }
}
