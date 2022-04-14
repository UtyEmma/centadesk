<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ParseCurrencyToSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next){
        if(!Session::exists('currency') && Session::get('currency')){
            $user = $request->user();
            $currency = $user ? $user->currency : env('DEFAULT_CURRENCY');
            Session::put('currency', $currency);
        }
        return $next($request);
    }
}
