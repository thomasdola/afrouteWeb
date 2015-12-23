<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CompaniesStationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
	    $company_id = Auth::travel_company_staff()->get()->travel_company->id;
	    $stations = Station::whereraw('travel_company_id = ?', [$company_id])
		    ->orderBy('created_at', 'desc')
		    ->get();
        return view('companies.stations.index')->with('stations', $stations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
	    return view('companies.stations.create');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
    public function store(Request $request)
    {
	    $company_id = Auth::travel_company_staff()->get()->travel_company->id;
	    $this->validate($request,
		    [
			    'country'=>'required',
			    'region'=>'required',
			    'city'=>'required',
			    'location'=>'required',
		    ]);
	    $request = array_add($request->all(), 'travel_company_id', $company_id);
        Station::create($request);
	    return redirect()->route('company.stations.index');
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
	 * @internal param int $id
	 * @return Response
	 */
    public function edit(Station $station)
    {
        return view('companies.stations.edit')->with('station', $station);
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
    public function update(Station $station, Request $request)
    {
        $station->update($request->all());
	    return redirect()->route('company.stations.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Station $station
	 *
	 * @throws \Exception
	 * @internal param int $id
	 * @return Response
	 */
    public function destroy(Station $station)
    {
        $station->delete();
	    return redirect()->route('company.stations.index');
    }
}
