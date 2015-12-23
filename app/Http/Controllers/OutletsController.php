<?php

namespace App\Http\Controllers;

use App\Outlet;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OutletsController extends Controller
{
    public function store(Request $request)
    {
	    $this->validate($request,
		    [
			    'name'  => 'required',
			    'location'  => 'required',
			    'type'  => 'required',
		    ]);
	    Outlet::create($request->all());
	    $outlets =  Outlet::all();
	    $html = view('admin.settings.outlet_table')->withOutlets($outlets);
        return $html;
    }

	public function delete($id)
	{
		$outlet = Outlet::findOrFail($id);
		$outlet->delete();
	}
}
