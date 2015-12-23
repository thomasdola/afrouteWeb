<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentalRequest;
use App\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RentalsController extends Controller
{
	/**
	 * @param RentalRequest $request
	 * @return $this|\Illuminate\Http\RedirectResponse
     */
	public function create(RentalRequest $request)
    {
	    $departing_date = Carbon::parse($request->departing_date);

        if($request->trip_type == "round_trip")
        {
            $destination_date = Carbon::parse($request->returning_date);

            if($departing_date->gte($destination_date) || $departing_date->lte(Carbon::today()))
            {
                return redirect()->back()->withErrors('Invalid Date range Input')->withInput();
            }

            $input = $request->except(['departing_date', 'destination_date']);

            $input = array_add($input, 'departing_date', $departing_date);

            $input = array_add($input, 'destination_date', $destination_date);


        }
        elseif($request->trip_type == "one_way")
        {
            if($departing_date->lte(Carbon::today()))
            {
                return redirect()->back()->withErrors('Invalid Date Input')->withInput();
            }

            $input = $request->except(['departing_date', 'destination_date']);

            $input = array_add($input, 'departing_date', $departing_date);

        }

	    $rental_request = Rental::create($input);

	    session()->put('request', $rental_request);

        //Event firing
	    //listen to this event in order to send sms and email

	    return redirect()->route('rental_feedback');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function rental_feedback()
	{
		$request = session()->get('request');

		return view('payment.request_success', ['request'=>$request]);
	}

    /**
     * @return $this
     */
    public function index()
	{
		$requests = Rental::all();

//        dd($requests);

		return view('admin.rentals.index')->with('requests', $requests);
	}

    /**
     * @param $id
     * @return $this
     */
    public function show($id)
    {
        $rental = Rental::findOrFail($id);

//        dd($rental);

        return view('admin.rentals.show')->with('rental', $rental);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
	{
		Rental::find($id)->delete();

		return redirect()->route('bus_request');
	}
}
