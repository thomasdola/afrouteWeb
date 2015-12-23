<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AppAdminAuthenticationController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin-guest', ['except' => 'getStaffLogout']);
	}


	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getStaffLogout()
	{
		Auth::staff()->logout();
		Session::flush();
		return  redirect()->route('staff_login');
	}



	public function getStaffLogin()
	{
		return view('admin.auth.login');
	}

	public function postStaffLogin(Request $request)
	{
		$this -> validate($request,
			[
				'email' => 'required',
				'password'  => 'required',
			]);

		$credentials = $request->only('email', 'password');

//		dd($credentials);

		if (Auth::staff()->attempt($credentials, $request->has('remember')))
		{
			return redirect()->route('admin');
		}

		return redirect()->route('staff_login')
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),
					]);

	}

	private function getFailedLoginMessage()
	{
		return 'These credentials do not match our records.';
	}
}
