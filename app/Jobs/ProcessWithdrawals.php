<?php

namespace App\Jobs;

use App\Http\Traits\WithdrawalActions;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessWithdrawals implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, WithdrawalActions;

    private $withdrawals;

    public function __construct($withdrawals){
        $this->withdrawals = $withdrawals;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(){
        $withdrawals = $this->withdrawals;
        if(is_array($withdrawals)){
            foreach ($withdrawals as $withdrawal) {
                $this->handleWithdrawal($withdrawal);
            }
            return;
        }

        $this->handleWithdrawal($withdrawals);
    }
}
