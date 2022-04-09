<?php

use App\Http\Traits;
use App\Http\Traits\BatchActions;
use App\Http\Traits\MentorActions;
use App\Library\DateTime;
use App\Models\Batch;
use App\Models\Report;
use App\Models\Wallet;
use App\Notifications\EarningsUpdatedNotification;

trait WalletActions {
    use MentorActions, BatchActions;

    function updateEscrowFunds(){
        $mentors = $this->getApprovedMentors();
        $day_count = env('WITHDRAWAL_DAY_COUNT');

        $mentors->map(function ($mentor) use($day_count) {
            $wallet = $this->getWalletWithEscrowFunds($mentor);
            if(is_null($wallet)) return;
            $batches = $this->getUnpaidBatches($mentor);
            if(!!$batches->isNotEmpty()) return;

            $batches->map(function($batch) use ($wallet, $day_count, $mentor) {
                if(DateTime::dateDiff($batch->enddate) < $day_count) return;
            });
        });
    }

    function getWalletWithEscrowFunds($user){
        return Wallet::where('user_id', $user->unique_id)->where(['escrow', '>', 0])->first();
    }

    function updateWalletEscrowFunds($batch, $wallet, $mentor){
        if($this->getBatchReports($batch)->isNotEmpty() || $batch->payable === false) return;

        $wallet->escrow -= $batch->earnings;
        $wallet->available -= $batch->earnings;
        $batch->paid = true;
        $mentor->notify(new EarningsUpdatedNotification());
    }

}
