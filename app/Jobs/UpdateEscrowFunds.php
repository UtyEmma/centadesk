<?php

namespace App\Jobs;

use App\Http\Traits\MentorActions;
use App\Http\Traits\WalletActions;
use App\Library\DateTime;
use App\Models\Batch;
use App\Models\Enrollment;
use App\Models\Report;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\EarningsUpdatedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateEscrowFunds implements ShouldQueue{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, MentorActions, WalletActions;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(){
        $this->updateEscrowFunds();
    }
}
