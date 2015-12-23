<?php

namespace App\Http\Controllers;

use App\Role;
use App\TravelCompany;
use App\TravelCompanyRole;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
    public function store(Request $request)
    {
	    $this->validate($request, [
            'name' => 'required',
        ]);
	    Role::create($request->all());
	    $roles =  Role::all();
        $html = view('admin.settings.roles_table')->with('roles', $roles);
        return $html;

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        $role = Role::findOrFail($id);
	    $role->delete();
    }
}
