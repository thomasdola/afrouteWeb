<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AppCompanyStaffAuthenticationController extends Controller
{
	public function __construct()
	{
		$this->middleware('company-guest', ['except'=>'getCompanyLogout']);
	}


	/**
	 * @return \Illuminate\View\View
     */
	public function getCompanyLogin()
	{
		return view('companies.auth.login');
	}


	/**
	 * @param Request $request
	 * @return $this|\Illuminate\Http\RedirectResponse
     */
	public function postCompanyLogin(Request $request)
	{
		$this -> validate($request,
			[
				'email' => 'required',
				'password'  => 'required',
			]);
		$credentials = $request->only('email', 'password');

		if(Auth::travel_company_staff()->attempt($credentials, $request->has('remember')))
		{
			return redirect()->intended('company/dashboard');
		}else
		{
			return redirect()->route('company_login')
							->withInput($request->only('email', 'remember'))
							->withErrors([
								'email' => $this->getFailedLoginMessage(),
							]);
		}
	}


	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getCompanyLogout()
	{
		Auth::travel_company_staff()->logout();
		Session::flush();
		return  redirect()->route('company_login');
	}


	/**
	 * @return string
     */
	private function getFailedLoginMessage()
	{
		return 'These credentials do not match our records.';
	}
}
