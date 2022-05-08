<?php

namespace App\Http\Middleware;

use App\Library\Response;
use Closure;
use Illuminate\Http\Request;

class CheckStudentOnboardingStatus
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
        if(!$user->interests) return Response::redirect('/onboarding');
        return $next($request);
    }
}
