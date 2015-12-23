<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTravelCompaniesRequest;
use App\TravelCompany;
use App\TravelCompanyStaff;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TravelCompaniesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param TravelCompany $travelCompany
	 *
	 * @return Response
	 */
    public function index(TravelCompany $travelCompany)
    {
        return view('admin.companies.index')->with('travel_companies', $travelCompany -> all());
    }

	/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
	    return view('admin.companies.create');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateTravelCompaniesRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTravelCompaniesRequest $request)
	{
		$email = $request->email;
		$password = $request->password;
		$name = $request->name;
		$phone = $request->phone;
		$slug = str_slug($request->name);

		TravelCompany::create(['email'=>$email, 'name'=>$name, 'phone'=>$phone, 'slug'=>$slug]);
		$travel_company = TravelCompany::all()->last();
		TravelCompanyStaff::create(['email'=>$email, 'name'=>$name, 'phone'=>$phone, 'password'=>$password, 'travel_company_id'=>$travel_company->id, 'type'=>1]);
		return redirect()->route('admin.travel-companies.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param TravelCompany $travelCompany
	 *
	 * @internal param int $id
	 * @return Response
	 */
    public function show(TravelCompany $travelCompany)
    {
	    return view('admin.companies.show')->with('travel_company', $travelCompany);
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param TravelCompany $travelCompany
	 *
	 * @internal param int $id
	 * @return Response
	 */
    public function edit(TravelCompany $travelCompany)
    {
	    return view('admin.companies.edit')->with('travel_company', $travelCompany);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param TravelCompany $travelCompany
	 * @param CreateTravelCompaniesRequest|Request $request
	 *
	 * @internal param int $id
	 * @return Response
	 */
    public function update(TravelCompany $travelCompany, Request $request)
    {
	    $this->validate($request,
		    [
			    'email'=>'email',
		    ]);
	    $travelCompany->name = $request->name;
	    $travelCompany->phone = $request->phone;
	    $travelCompany->email = $request->email;
//	    dd($travelCompany);
	    $travelCompany->save();
//	    $travelCompany->update($request->all());
	    return redirect()->route('admin.travel-companies.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param TravelCompany $travelCompany
	 *
	 * @throws \Exception
	 * @internal param int $id
	 * @return Response
	 */
    public function destroy(TravelCompany $travelCompany)
    {
	    $travelCompany->delete();
	    return redirect()->route('admin.travel-companies.index');
    }
}
