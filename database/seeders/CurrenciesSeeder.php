<?php

namespace Database\Seeders;

use App\Http\Traits\CurrencyActions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder{
    use CurrencyActions;

    function __construct(){
        return $this->run();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        return $this->createCurrencies();
    }
}
