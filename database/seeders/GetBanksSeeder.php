<?php

namespace Database\Seeders;

use App\Http\Traits\BankActions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GetBanksSeeder extends Seeder{
    use BankActions;

    function __construct(){
        return $this->run();
    }

    public function run(){
        return $this->setBanks();
    }
}
