<?php

namespace App\Http\Middleware;

use App\Trip;
use Closure;
use GuzzleHttp\Message\Request;
use Illuminate\Support\Facades\Session;

class TripAvailability
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
	    $trip = Trip::findOrFail($request->trip_id);

	    if(!$trip)
	    {
		    return redirect()->back();
	    }
        return $next($request);
    }
}
