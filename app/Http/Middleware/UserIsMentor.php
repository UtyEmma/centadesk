<?php

namespace App\Http\Middleware;

use App\Library\Response;
use Closure;
use Illuminate\Http\Request;

class UserIsMentor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next){
        $user = $request->user();
        if($user->role === 'mentor' && $user->kyc_status === 'approved') return $next($request);
        return Response::redirect('/mentor/onboarding', 'error', "You are not yet a Mentor! You are not allowed to access this page.");
    }
}
