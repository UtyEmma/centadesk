<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Token;
use App\Models\Currencies;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller{

    function getCountries(Request $request){
        try {
            $response = Http::get(env('COUNTRY_LAYER_API_URL').'/all?access_key='.env('COUNTRY_LAYER_API_KEY'));
            // if(!$response->ok()) throw new Exception('Exchange Rate update Failed');
            echo(env('COUNTRY_LAYER_API_URL').'/all?access_key='.env('COUNTRY_LAYER_API_KEY'));

            $response = $response->json();
            return print_r($response);
            // $symbols = $response['symbols'];

            // foreach ($symbols as $symbol) {
            //     $unique_id = Token::unique('currencies');
            //     $base = $symbol['code'] === "USD";

            //     Currencies::create([
            //         'unique_id' => $unique_id,
            //         'symbol' => $symbol['code'],
            //         'name' => $symbol['description'],
            //         'base' => $base
            //     ]);
            // }

            return redirect()->back()->with('success', 'Exchange Rates updated');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function setCurrencies(Request $request){
        try {
            $response = Http::get(env('EXCHANGERATE_API_URL').'/symbols');
            if(!$response->ok()) throw new Exception('Exchange Rate update Failed');

            $response = $response->json();
            $symbols = $response['symbols'];

            foreach ($symbols as $symbol) {
                $unique_id = Token::unique('currencies');
                $base = $symbol['code'] === "USD";

                Currencies::create([
                    'unique_id' => $unique_id,
                    'symbol' => $symbol['code'],
                    'name' => $symbol['description'],
                    'base' => $base
                ]);
            }

            return redirect()->back()->with('success', 'Exchange Rates updated');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function updateRates(Request $request){
        try {
            $response = Http::get(env('EXCHANGERATE_API_URL').'/latest');

            if(!$response->ok()) throw new Exception('Exchange Rate update Failed');

            $response = $response->json();
            $rates = $response['rates'];

            foreach ($rates as $key => $rate) {
                Currencies::where('symbol', $key)->update([
                    'rate' => $rate
                ]);
            }

            return redirect()->back()->with('success', 'Exchange Rates updated');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function currencies(Request $request){
        $currencies = Currencies::all();
        $base = Currencies::where('base', true)->first();

        return view('admin.currencies.index', [
            'currencies' => $currencies,
            'base' => $base
        ]);
    }

}
