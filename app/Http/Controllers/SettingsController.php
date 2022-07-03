<?php

namespace App\Http\Controllers;

use App\Library\Response;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    function updateCurrency(Request $request){
        $user = $this->user();

        // return print ($request->currency);
        if($user) {
            $user->currency = $request->currency;
            $user->save();
        }

        return redirect()->back()->cookie('currency', $request->currency);
    }
}
