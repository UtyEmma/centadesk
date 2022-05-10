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
            if($request->withdrawals && is_array($request->withdrawals)){
                $withdrawal_ids = $request->withdrawals;
                ProcessWithdrawals::dispatch($withdrawal_ids);
            }else if($request->withdrawal_id){
                $withdrawal_id = $request->withdrawal_id;
                $this->handleWithdrawal($withdrawal_id);
            }
            return Response::redirectBack('success', 'Withdrawal Completed');
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function withdrawalRequests(Request $request){
        $withdrawals = Withdrawal::where('status', 'pending')
                        ->join('users', 'users.unique_id', 'withdrawals.user_id')
                        ->join('wallets', 'withdrawals.user_id', 'wallets.user_id')
                        ->select('withdrawals.*', 'wallets.available', 'users.firstname', 'users.lastname', 'users.avatar')
                        ->paginate(env('ADMIN_PAGINATION_COUNT'));

        return Response::view('admin.withdrawals', [
            'withdrawals' => $withdrawals
        ]);
    }

    function show(){
        $withdrawals = Withdrawal::join('users', 'users.unique_id', 'withdrawals.user_id')
                        ->select('withdrawals.*', 'users.firstname', 'users.lastname', 'users.avatar')
                        ->paginate(env('ADMIN_PAGINATION_COUNT'));

        return Response::view('admin.withdrawals', [
            'withdrawals' => $withdrawals
        ]);
    }

}
