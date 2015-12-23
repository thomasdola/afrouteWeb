<?php

namespace App\Http\Controllers;

use App\Rental;
use App\TravelCompany;
use App\User;
use App\Trip;
use App\Booking;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
	    $totalTrips = Trip::all()->count();
	    $totalTravelCompanies = TravelCompany::all()->count();
	    $totalUsers = User::all()->count();
	    $totalPaidBookings = Booking::where('status', 'paid')->count();
	    $totalBus = Rental::all()->count();
	    return view('admin.dashboard',
		    [
			    'tT'=>$totalTrips,
			    'tU'=>$totalUsers,
			    'tP'=>$totalPaidBookings,
			    'tC'=>$totalTravelCompanies,
			    'tB'=>$totalBus
		    ]);
    }
}
