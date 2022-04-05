<?php

namespace App\Http\Controllers;

use App\Library\Response;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WalletController extends Controller{

    public function mentorWallet(Request $request){
        $user = $this->user();
        return Response::view('dashboard.wallet', [
            'wallet' => $user->wallet,
            'withdrawals' => $user->withdrawals,
            'user' => $user
        ]);
    }

}
