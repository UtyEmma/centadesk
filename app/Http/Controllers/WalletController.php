<?php

namespace App\Http\Controllers;

use App\Http\Traits\WalletActions;
use App\Library\DateTime;
use App\Library\Response;
use App\Models\Deposit;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WalletController extends Controller{
    use WalletActions;

    public function mentorWallet(Request $request){
        $user = $this->user();
        return Response::view('dashboard.wallet', [
            'wallet' => $user->wallet,
            'withdrawals' => $user->withdrawals(),
            'user' => $user
        ]);
    }

    public function studentWallet(Request $request){
        $user = $this->user();

        $deposits = Deposit::where([
            'user_id' => $user->unique_id,
            'status' => 'completed'
        ])->get();

        return Response::view('front.student.wallet', [
            'user' => $user,
            'wallet' => $user->wallet,
            'deposits' => $deposits
        ]);

    }

    public function updateWallet(){
        $this->updateEscrowFunds();
    }

}
