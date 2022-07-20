<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    // public function handle(Request $request, Closure $next)
    // {
    //     if (Auth::guard('web')->user()) {
    //         return $next($request);
    //     }
        
    //     return redirect()->route('logAdmin');
    // }

    protected function redirectTo($request)
    {
        //dd($request);
        if (! $request->expectsJson() || ! Auth::guard('admin')->user()) {
            return route('register');
        }
    }
}
