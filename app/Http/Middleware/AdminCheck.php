<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheck
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
	    if(strtolower(Auth::staff()->get()->role->id) != 1 AND strtolower(Auth::staff()->get()->role->id) != 2)
	    {
		    abort('404');
	    }

        return $next($request);
    }
}
