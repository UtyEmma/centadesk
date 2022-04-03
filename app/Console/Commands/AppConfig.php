<?php

namespace App\Console\Commands;

use Database\Seeders\AppConfigSeeder;
use Database\Seeders\CurrenciesSeeder;
use Database\Seeders\DefaultAdminSeeder;
use Illuminate\Console\Command;

class AppConfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup Default Admin account and app configurations';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(){
        $bar = $this->output->createProgressBar(3);
        $bar->start();
        $details = new DefaultAdminSeeder();
        $this->info('Default Administrator Account Created');
        $bar->advance();
        new AppConfigSeeder();
        $this->info('App Configuration set up complete');
        $bar->advance();
        new CurrenciesSeeder();
        $this->info('Currencies and Exchange rates set successfully');
        $bar->finish();

        $this->info('App Setup Completed Successfully!');
        $this->info('Admin Email: '.$details->admin->email);
        $this->info('Admin Password: '.$details->admin->plain_password);
    }
}
