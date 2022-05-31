<?php

namespace App\Http\Traits;

use App\Library\Token;
use App\Models\Bank;
use Exception;
use Illuminate\Support\Facades\Http;

trait BankActions {

    function getBanks(){
        $url = env('RAVE_API_BASE_URL').'/banks/NG';
        $response = Http::withToken(env('RAVE_SECRET_KEY'))->get($url);
        if($response->status() !== 200) throw new Exception("Banks info could not be retrieved");
        $res = $response->collect();
        return $res->get('data');
    }

    function setBanks(){
        $banks = collect($this->getBanks());

        // dd($banks);
        $banks->map(function($bank){
            $unique_id = Token::unique('banks');

            Bank::updateOrCreate([
                'code' => $bank['code'],
                'name' => $bank['name']
            ], [
                'unique_id' => $unique_id,
                'code' => $bank['code'],
                'name' => $bank['name']
            ]);
        });

        return true;
    }

}
