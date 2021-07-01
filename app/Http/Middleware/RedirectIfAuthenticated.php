<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->role == 'admin')
            {
                return redirect('/home');
            }
            if(Auth::user()->role == 'superviso')
            {
                return redirect('/home');
            }
            if(Auth::user()->role == 'operator')
            {
                return redirect('/home');
            }
            elseif (Auth::user()->role == 'customer')
            {
                return redirect('/custPanel');
            }
            /*return redirect(RouteServiceProvider::HOME);*/
        }

        return $next($request);
    }
}
