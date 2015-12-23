<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
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
	    elseif(Auth::travel_company_staff()->get())
	    {
		    return redirect()->route('company_login');
	    }

        return $next($request);
    }
}
