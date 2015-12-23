<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfNotUser
{

	/**
	 * @var Guard
	 */
	private $auth;

	public function __construct(Guard $auth)
	{

		$this->auth = $auth;
	}
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
	    if($this->auth->travel_company_staff()->get())
	    {
		    return redirect()->route('companyLogin');
	    }
	    elseif($this->auth->staff()->get())
	    {
		    return redirect()->route('adminLogin');
	    }

        return $next($request);
    }
}
