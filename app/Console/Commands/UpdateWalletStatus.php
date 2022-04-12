<?php

namespace App\Console\Commands;

use App\Http\Traits\WalletActions;
use App\Jobs\UpdateEscrowFunds;
use Illuminate\Console\Command;

class UpdateWalletStatus extends Command{
    use WalletActions;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'escrow:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Handle Daily updates for the Wallet (After a set number of days from the last day of a class, funds in Escrow are sent to the users wallet)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(){
        $updatedWallets = $this->updateEscrowFunds();
        $message = "$updatedWallets were updated";
    }
}
