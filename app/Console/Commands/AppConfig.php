<?php

namespace App\Console\Commands;

use Database\Seeders\AppConfigSeeder;
use Database\Seeders\BlogPostSeeder;
use Database\Seeders\CategoriesSeeder;
use Database\Seeders\CurrenciesSeeder;
use Database\Seeders\DefaultAdminSeeder;
use Database\Seeders\FaqSeeder;
use Database\Seeders\GetBanksSeeder;
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

    public function handle(){
        $details = new DefaultAdminSeeder();
        $this->info('Default Administrator Account Created');

        new AppConfigSeeder();
        $this->info('App Configuration set up completed');

        new CategoriesSeeder();
        $this->info('Categories Seeded');

        new CurrenciesSeeder();
        $this->info('Currencies and Exchange rates set successfully!');


        new FaqSeeder();
        $this->info('Frequently Asked Questions Updated Successfully!');

        new BlogPostSeeder();
        $this->info('Medium Blog Posts Updated Successfully!');

        new GetBanksSeeder();
        $this->info('Bank Info retrieved successfully!');

        echo "\r\n";
        $this->info('App Setup Completed Successfully!');
        $this->info('Admin Email: '.$details->admin->email);
        $this->info('Admin Password: '.$details->admin->plain_password);
    }
}
