<?php

namespace App\Http\Traits;

use App\Http\Traits\BatchActions;
use App\Http\Traits\MentorActions;
use App\Library\DateTime;
use App\Models\Batch;
use App\Models\Report;
use App\Models\Setting;
use App\Models\Wallet;
use App\Notifications\EarningsUpdatedNotification;
use Illuminate\Support\Facades\Date;

trait WalletActions {
    use MentorActions, BatchActions;

    function updateEscrowFunds(){
        $updatedWallets = 0;
        $mentors = $this->getApprovedMentors();
        $day_count = Setting::first()->withdrawal_day_count ?? env('WITHDRAWAL_DAY_COUNT');

        $mentors->map(function ($mentor) use($day_count, $updatedWallets) {
            $wallet = $this->getWalletWithEscrowFunds($mentor);
            if(is_null($wallet)) return;
            $batches = $this->getUnpaidBatches($mentor);
            if(!!$batches->isNotEmpty()) return;

            $batches->map(function($batch) use ($wallet, $day_count, $mentor, $updatedWallets) {
                $withdrawalDate = Date::parse($batch->endate)->addDays($day_count);
                if(now()->greaterThanOrEqualTo($withdrawalDate)){
                    $this->updateWalletFunds($batch, $wallet, $mentor);

                    $updatedWallets++;
                };
            });
        });

        return $updatedWallets;
    }

    function sendUpdateNotification($mentor, $batch) {

    }

    function getWalletWithEscrowFunds($user){
        return Wallet::where('user_id', $user->unique_id)->where('escrow', '>', 0)->first();
    }

    function updateWalletFunds($batch, $wallet, $mentor){
        if($this->getBatchReports($batch)->isNotEmpty() || $batch->payable === false) return;

        $wallet->escrow -= $batch->earnings;
        $wallet->available += $batch->earnings;
        $batch->paid = true;
        $mentor->notify(new EarningsUpdatedNotification());
    }

}
