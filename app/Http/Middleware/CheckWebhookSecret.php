<?php

namespace App\Http\Middleware;

use App\Library\Response;
use App\Models\Setting;
use Closure;
use Exception;
use Illuminate\Http\Request;

class CheckWebhookSecret
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next){
        $coinbaseHeader = 'X-CC-Webhook-Signature';
        $flutterwaveHeader = 'verif-hash';

        if($request->hasHeader($coinbaseHeader)){ //Coinbase payment
            $signature = $request->header($coinbaseHeader);
            if($signature === Setting::first()->coinbase_webhook_secret ?? env('COINBASE_WEBHOOK_SECRET')){
                return $next($request);
            }
        }elseif ($request->hasHeader($flutterwaveHeader)) { //Flutterwave
            $signature = $request->header($flutterwaveHeader);
            if($signature === Setting::first()->rave_webhook_secret ?? env('RAVE_WEBHOOK_SECRET')){
                return $next($request);
            }
        }

        return Response::json(400, 'No valid Header was found');
    }
}
