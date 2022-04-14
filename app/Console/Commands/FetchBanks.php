<?php

namespace App\Console\Commands;

use Database\Seeders\GetBanksSeeder;
use Illuminate\Console\Command;

class FetchBanks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:banks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(){
        return new GetBanksSeeder();
    }
}
