<?php

namespace App\Http\Traits;

use App\Http\Traits\BatchActions;
use App\Http\Traits\MentorActions;
use App\Library\DateTime;
use App\Library\Notifications;
use App\Models\Batch;
use App\Models\Report;
use App\Models\Setting;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\EarningsUpdatedNotification;
use Illuminate\Support\Facades\Date;

trait WalletActions {
    use MentorActions, BatchActions;

    function updateEscrowFunds(){
        $updatedWallets = 0;
        $mentors = User::where([
            'role' => 'mentor',
            'kyc_status' => 'approved'
        ])->with('wallet')->get();


        $mentors->map(function ($mentor) use($updatedWallets) {
            $wallet = $mentor->wallet;
            if($wallet->escrow < 1) return;
            $batches = Batch::where([
                'mentor_id' => $mentor->unique_id,
                'paid' => false
            ])->where('enddate', '<=', now())->get();

            if($batches->isNotEmpty()) {
                $batches->map(function($batch) use ($wallet, $mentor) {
                    if($batch->earnings <= 0) return;

                    $day_count = Setting::first()->withdrawal_day_count ?? env('WITHDRAWAL_DAY_COUNT');
                    // $withdrawalDate = Date::parse($batch->enddate)->addMinutes($day_count);
                    $withdrawalDate = Date::parse($batch->enddate)->addDays($day_count);

                    if(now()->greaterThanOrEqualTo($withdrawalDate)){
                        $this->updateWalletFunds($batch, $wallet);
                        $this->sendNotification($mentor, $batch);
                    };
                });

                $updatedWallets++;
            }else{
                return;
            }
        });

        return $updatedWallets;
    }

    function sendNotification($mentor, $batch){
        $message = [
            Notifications::parse('image', asset('images/email/kyc-pending.png')),
            Notifications::parse('text', "Your earnings on for your <strong>".$batch->title."</strong> session at".env('APP_NAME')." have been updated"),
            Notifications::parse('text', 'You can now withdraw your funds from your '.env('APP_NAME').' wallet!'),
            Notifications::parse('action', [
                'link' => route('mentor.wallet'),
                'action' => "Go to My Wallet"
            ]),
            Notifications::parse('text', 'If you have any complaints, please send an Email to '.env('LIBRACLASS_EMAIL')),
        ];

        $notification = Notifications::builder("Your Earnings have been updated!", $message);
        Notifications::send($mentor, $notification, ['mail']);
    }

    function getWalletWithEscrowFunds($user){
        return Wallet::where('user_id', $user->unique_id)->where('escrow', '>', 0)->first();
    }

    function updateWalletFunds($batch, $wallet){
        $wallet->escrow = $wallet->escrow - $batch->earnings;
        $wallet->available = $wallet->available + $batch->earnings;
        $wallet->save();

        $batch->paid = true;
        $batch->save();
    }

    function updateMentorWallet($mentor, $amount){
        $wallet = Wallet::where('user_id', $mentor->unique_id)->first();
        $wallet->earnings = $wallet->earnings + $amount;
        $wallet->escrow = $wallet->escrow + $amount;
        $wallet->balance = $wallet->balance + $amount;
        $wallet->save();
    }

    function handleWalletPayment($wallet, $amount){
        if($wallet->referrals >= $amount){
            $wallet->referrals -= $amount;
            $wallet->save();
            return true;
        }

        if($wallet->deposits >= $amount){
            $wallet->deposits -= $amount;
            $wallet->save();
            return true;
        }

        $total_wallet = $wallet->deposits + $wallet->referrals;

        if($total_wallet >= $amount){
            $remaining_money = $amount - $wallet->referrals;
            $wallet->referrals = 0;
            $wallet->deposits -= $remaining_money;
            $wallet->save();
            return true;
        }

        return false;
    }

}
