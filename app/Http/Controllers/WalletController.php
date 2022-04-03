<?php

namespace App\Http\Controllers;

use App\Library\Response;
use Illuminate\Http\Request;

class WalletController extends Controller{

    public function mentorWallet(Request $request){
        return Response::view('dashboard.wallet');
    }

}
