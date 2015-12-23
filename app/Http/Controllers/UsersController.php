<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Role;
use App\Staff;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
	    $staffs = Staff::all();
        return view('admin.users.index')->with('staffs', $staffs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
	    $roles = Role::all();
	    return view('admin.users.create')->with('roles', $roles);
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateUsersRequest $request
	 *
	 * @return Response
	 */
    public function store(CreateUsersRequest $request)
    {
        Staff::create($request->all());
	    return redirect()->route('admin.staffs.index');
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
	 * @param Staff $staff
	 *
	 * @internal param int $id
	 * @return Response
	 */
    public function edit(Staff $staff)
    {
	    $roles = Role::all();
        return view('admin.users.edit', ['staff'=>$staff, 'roles'=>$roles]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @param CreateUsersRequest $request
	 *
	 * @return Response
	 */
    public function update(Staff $staff, CreateUsersRequest $request)
    {
	    $staff -> update($request -> all());
	    return redirect()->route('admin.staffs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Staff $staff)
    {
	    $staff->delete();
	    return redirect()->route('admin.staffs.index');
    }
}
