<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Payment;
use App\TravelCompany;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountingController extends Controller
{
    public function index()
    {
	    $start = Carbon::today()->startOfDay();
        $end = Carbon::today()->endOfDay();
	    $bookings = Booking::whereBetween('updated_at', [$start, $end])
            ->where('status', 'paid')
            ->lists('travel_company_id');
        $todayBookingsCompanies = array_unique($bookings->toArray());

//	    $com_list = Payment::whereBetween('updated_at', [$start, $end])
//		    ->lists('travel_company_id')
//		    ->toArray();
//	    $c_lists = array_unique($com_list);


	    $today_companies = TravelCompany::whereIn('id', $todayBookingsCompanies)->get();
//        dd($todayBookingsCompanies, $bookings, $today_companies);
        return view('admin.accounting.index', ['companies' => $today_companies])->with('bookings', $bookings);

    }

	public function single($slug)
	{
		$start = Carbon::today()->startOfDay();
		$end = Carbon::today()->endOfDay();
		$company = TravelCompany::where('slug', $slug)->first();

		$bookings = Payment::where('travel_company_id', $company->id)
			->whereBetween('updated_at', [$start, $end])
			->orderBy('updated_at', 'asc')
			->get();

//        dd($bookings);

		return view('admin.accounting.single',
			[
				'bookings'=>$bookings,
			]);
	}
}
