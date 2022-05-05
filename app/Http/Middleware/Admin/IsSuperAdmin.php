<?php

namespace App\Http\Middleware\Admin;

use App\Library\Response;
use Closure;
use Illuminate\Http\Request;

class IsSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next){
        $user = $request->user('admin');
        if($user->role !== 'super-admin') return Response::redirectBack('error', 'Only A Super Admin can carry out this action');
        return $next($request);
    }
}
