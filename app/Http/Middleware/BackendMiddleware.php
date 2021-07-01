<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class BackendMiddleware
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
        if(Auth::check() && Auth::user()->role == 'admin')
            {
            return $next($request);
            }
        if(Auth::check() && Auth::user()->user_role=='supervisor')
        {
            return $next($request);
        }
        if(Auth::check() && Auth::user()->user_role=='operator')
        {
            return $next($request);
        }
        else
        {
          return redirect()->back();
        }
    }
}
