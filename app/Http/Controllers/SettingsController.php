<?php

namespace App\Http\Controllers;

use App\Library\Response;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    function updateCurrency(Request $request){
        $user = $this->user();

        if($user) {
            $user->currency = $request->currency;
            $user->save();
        }

        return redirect()->back()->cookie('currency', $request->currency);
    }
}
