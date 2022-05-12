<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\WithdrawalActions;
use App\Jobs\ProcessWithdrawals;
use App\Library\Flutterwave;
use App\Library\Response;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Exception;
use Illuminate\Http\Request;

class WithdrawalController extends Controller{
    use WithdrawalActions;

    function sendFunds(Request $request){
        try {
            if(!Withdrawal::find($request->withdrawal_id)) throw new Exception('The Requested withdrawal was not found');
            $this->handleWithdrawal($request->withdrawal_id);
            return Response::redirectBack('success', 'Withdrawal Completed');
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function show(Request $request){
        if($request->type === 'requests'){
            $withdrawals = Withdrawal::where('status', 'pending')
                                        ->join('users', 'users.unique_id', 'withdrawals.user_id')
                                        ->join('wallets', 'withdrawals.user_id', 'wallets.user_id')
                                        ->select('withdrawals.*', 'wallets.available', 'users.firstname', 'users.lastname', 'users.avatar', 'users.unique_id as user_id')
                                        ->paginate(env('ADMIN_PAGINATION_COUNT'));
        }else{
            $withdrawals = Withdrawal::join('users', 'users.unique_id', 'withdrawals.user_id')
                                        ->join('wallets', 'withdrawals.user_id', 'wallets.user_id')
                                        ->select('withdrawals.*', 'wallets.available', 'users.firstname', 'users.lastname', 'users.avatar')
                                        ->paginate(env('ADMIN_PAGINATION_COUNT'));
        }

        return Response::view('admin.withdrawals', [
            'withdrawals' => $withdrawals
        ]);
    }

}
