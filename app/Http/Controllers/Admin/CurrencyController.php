<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\CurrencyActions;
use App\Library\Response;
use App\Library\Token;
use App\Models\Currencies;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller{
    use CurrencyActions;

    function setCurrencies(Request $request){
        try {
            $this->createCurrencies();
            return redirect()->back()->with('success', 'Exchange Rates updated');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function updateRates(Request $request){
        try {
            $this->updateCurrencyRates();
            return redirect()->back()->with('success', 'Exchange Rates updated');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function currencies(Request $request){
        $currencies = Currencies::paginate(env('ADMIN_PAGINATION_COUNT'));
        $base = Currencies::where('base', true)->first();

        return view('admin.currencies.index', [
            'currencies' => $currencies,
            'base' => $base
        ]);
    }

}