<?php

namespace App\Console\Commands;

use App\Http\Traits\WalletActions;
use App\Jobs\UpdateEscrowFunds;
use App\Library\Notifications;
use App\Models\Admin;
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
        $message = "$updatedWallets wallets were updated";

        $message = [
            Notifications::parse('image', asset('images/email/kyc-pending.png')),
            Notifications::parse('text', 'Wallet Status Update proccess has been completed!.'),
            Notifications::parse('text', $message)
        ];


        $admins = Admin::all();
        $notification = Notifications::builder("Daily Wallet Status Update!", $message);
        Notifications::send($admins, $notification, ['mail']);
    }
}
