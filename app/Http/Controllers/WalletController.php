<?php

namespace App\Http\Controllers;

use App\Library\DateTime;
use App\Library\Response;
use App\Models\Deposit;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WalletController extends Controller{

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
        $all = Deposit::where([
            'user_id' => $user->unique_id,
            'status' => 'completed'
        ])->get();

        $deposits = $all->map(function($deposit){
            $deposit->created = DateTime::parseTimestamp($deposit->created_at);
            return $deposit;
        });
        return Response::view('front.student.wallet', [
            'user' => $user,
            'wallet' => $user->wallet,
            'deposits' => $deposits
        ]);

    }

}
