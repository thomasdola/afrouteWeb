<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Outlet;
use App\Role;
use App\TravelCompany;
use App\BusFeature;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminSettingsController extends Controller
{
    public function index(Role $role, BusFeature $busFeaure, Outlet $outlet, Faq $faq)
    {
	    return view('admin.settings.index',
		    [
			    'roles'=>$role -> all(),
			    'bus_features'=>$busFeaure -> all(),
			    'faqs'=> $faq->all(),
			    'outlets'=>$outlet->all(),
		    ]);
    }


	public function getChangePassword()
	{
		return view('admin.settings.admin_profile');
	}

	public function change_password(Request $request)
	{
		$admin = Auth::staff()->get();

		$this->validate($request,
			[
				"password" => "confirmed|min:8"
			]);

		$input = $request->except("confirmation_password");

		$admin->update($input);

		session()->flash('info', "password has been changed");

		return redirect()->route("get_change_password");
	}
}
