<?php

namespace App\Http\Controllers;

use App\BusFeature;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TravelCompanyStaffRolesController extends Controller
{
    public function store(Request $request)
    {
	    $this->validate($request, [
            'name' => 'required',
            'icon' => 'required',
        ]);
	    BusFeature::create($request->all());
	    $travel_company_roles =  BusFeature::all();
        $html = view('admin.settings.travel_company_roles_table')->with('travel_company_roles', $travel_company_roles);
        return $html;
    }

	public function delete($id)
	{
		$role = BusFeature::findOrFail($id);
		$role -> delete();

	}
}
