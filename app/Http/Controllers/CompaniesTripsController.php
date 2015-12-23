<?php

namespace App\Http\Controllers;

use App\Station;
use App\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CompaniesTripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
	    $company_id = Auth::travel_company_staff()->get()->travel_company->id;
	    $trips = Trip::whereraw('travel_company_id = ?', [$company_id])
		    ->orderBy('created_at', 'desc')
		    ->get();
	    $sN = Station::whereraw('travel_company_id = ?', [$company_id])->count();
        return view('companies.trips.index', ['stations_number'=>$sN])->with('trips', $trips);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
	    $company_id = Auth::travel_company_staff()->get()->travel_company->id;
	    $stations = Station::whereraw('travel_company_id = ?', [$company_id])->get();
	    return view('companies.trips.create')->with('stations', $stations);
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
    public function store(Request $request, Trip $trip)
    {
	    $company = Auth::travel_company_staff()->get()->travel_company;
	    $stations = $company->stations->lists('city')->toArray();
	    $dps = $request->departure_station;
	    $des = $request->destination_station;
	    $this->validate($request,
            [
                'departure_station'=>"required | different:destination_station",
                'departure_date'=>"required",
                'departure_time'=>'required',
                'destination_station'=>"required",
                'fare'=>'required',
                'transport_model'=>'required',
                'hour'=>'integer|required',
                'minute'=>'integer|required',
	            'boarding_point'=>'required',
	            'number_of_seats'=>'required|integer'
            ]);

	    if( ! in_array($dps, $stations) OR ! in_array($des, $stations)) return redirect()
	    			->back()->withInput()->withErrors('Invalid Station');

	     $departure_date = $this->carbonize($request->departure_date);

		if($departure_date->lte(Carbon::tomorrow())) return redirect()
			->back()->withInput()->withErrors('Invalid Departure Date');

	    $min = $request->minute;
	    $hour = $request->hour;

	    $duration = $this->durationize($hour, $min);
	    $slug = str_slug($request->departure_station.' to '.$request->destination_station);

	    $code = $trip->code();

	    $input = array_add($request->except(['minute', 'hour']), 'code', $code);
	    $input['departure_date'] = $departure_date;
	    $input = array_add($input, 'travel_company_id', $company->id);
	    $input = array_add($input, 'duration', $duration);
	    $input = array_add($input, 'slug', $slug);
	    Trip::create($input);

	    return redirect()->route('company.trips.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Station $station
	 *
	 * @param Trip $trip
	 *
	 * @internal param int $id
	 * @return Response
	 */
    public function edit(Trip $trip)
    {
	    $company = Auth::travel_company_staff()->get()->travel_company;
	    $stations = Station::whereraw('travel_company_id = ?', [$company->id])->get();
        return view('companies.trips.edit', ['stations'=>$stations, 'trip'=>$trip]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Station $station
	 *
	 * @param Request $request
	 *
	 * @internal param int $id
	 * @return Response
	 */
    public function update(Station $station, Request $request, Trip $trip)
    {
	    $this->validate($request,
            [
                'departure_station'=>'required',
                'departure_date'=>'required',
                'departure_time'=>'required',
                'destination_station'=>'required',
                'fare'=>'required',
                'transport_model'=>'required',
	            'hour'=>'integer|required',
                'minute'=>'integer|required',
                'boarding_point'=>'required',
            ]);

	    $departure_date = $this->carbonize($request->departure_date);

        $this->ddCheck($departure_date);

        $min = $request->minute;
        $hour = $request->hour;

        $duration = $this->durationize($hour, $min);

        $slug = str_slug($request->departure_station.' to '.$request->destination_station);


	    $input = $request->except(['minute', 'hour']);
        $input['departure_date'] = $departure_date;
        $input = array_add($input, 'duration', $duration);
        $input = array_add($input, 'slug', $slug);



	    $trip->update($input);

	    return redirect()->route('company.trips.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Trip $trip
	 *
	 * @internal param Station $station
	 *
	 * @internal param int $id
	 * @return Response
	 */
    public function destroy(Trip $trip)
    {
	    $trip ->delete();
	    return redirect()->route('company.trips.index');
    }

	/**
	 * @param $hour
	 * @param $min
	 *
	 * @return string
	 */
	private function durationize($hour, $min)
	{
		return $duration = $hour . 'h '.$min.'m';
	}

	/**
	 * @param $departure_date
	 *
	 * @return $this
	 */
	private function ddCheck($departure_date)
	{
		if($departure_date -> lte(Carbon::today()))
	    {
		    return redirect()->back()->withInput()->withErrors('Departure Date Can Only be from tomorrow going');
	    }
	}

	private function carbonize($date)
	{
		return Carbon::parse($date);
	}


}
