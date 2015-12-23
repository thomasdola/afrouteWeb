<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotCompanyStaff
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

	    if(Auth::user()->get())
	    {
		   return redirect()->route('welcome');
	    }
	    elseif(Auth::staff()->get())
	    {
		    return redirect()->route('staff_login');
	    }
        return $next($request);
    }
}
