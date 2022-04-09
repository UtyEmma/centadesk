<?php

namespace App\Http\Controllers;

use App\Library\Flutterwave;
use Illuminate\Http\Request;

class WithdrawalController extends Controller{

    function initiate(Request $request){
        $flutterwave = new Flutterwave();
        $widthdrawal = $flutterwave->initiateWithdrawal();
        return print_r($widthdrawal);
    }
}
