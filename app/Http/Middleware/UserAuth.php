<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\facades\Auth;
class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            return $next($request);
        }
        return redirect(route('authLogin'));
    }
}
