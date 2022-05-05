<?php

namespace App\Http\Controllers\Admin;

use App\Casts\Currency;
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
        if ($request->has('keyword')) {
            $currency = Currencies::where('symbol', $request->keyword)->get();
            $currencies = $currency->isNotEmpty() ? $currency : Currencies::where('name', $request->keyword)->get();
        }else{
            $currencies = Currencies::paginate(env('ADMIN_PAGINATION_COUNT'));
        }

        $base = Currencies::where('base', true)->first();

        return view('admin.currencies.index', [
            'currencies' => $currencies,
            'base' => $base
        ]);
    }

    function updateCurrency(Request $request, $id){
        try {
            $currency = Currencies::find($id);
            $currency->update($request->all());
            return Response::redirectBack('success', "Currency Updated Successfully");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }
}
