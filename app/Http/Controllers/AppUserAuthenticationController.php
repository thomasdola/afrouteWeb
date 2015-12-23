<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AppUserAuthenticationController extends Controller
{
	public function __construct()
	{
		$this->middleware('user-guest', ['except' => 'getLogout']);
	}

	public function registerUser(Request $request)
	{

		$this->validate($request,
			[
				'name'=>'required|unique:users',
				'email'=>'required|unique:users|email',
				'password'=>'required|min:8',
				'phone'=>'required|min:10|max:10',
				'agree' =>'required'
			]);

		$input = $request->except('_token', 'agree', 'phone');

        $phone = $this->localizePhoneNumber($request);

//		$confirmation_code = str_random(30);

        $input = array_add($input, 'phone', $phone);

//		dd($input, $confirmation_code);

//		Mail::send('mails.verify', ['confirmation_code'=> $confirmation_code], function($message) use($request) {
//			$message->to($request->email, $request->username)
//				->subject('Verify your email address');
//		});

        $user = User::firstOrCreate($input);

        Auth::user()->login($user);

//		session()->flash('info', 'Thanks for signing up! Please check your email for confirmation.');

		return redirect()->route('customer_profile');
	}


	/**
	 * @param $confirmation_code
     */
	public function confirm($confirmation_code)
	{
		$user = User::where('confirmation_code', $confirmation_code)->first();

		if( ! $user)
		{
			return redirect()->route('welcome');
		}

		$user->confirmed = true;

		$user->confirmation_code = null;

		$user->save();

		session()->flash('info', 'You Have Successfully Verified Your Account.');

		return redirect()->route('login');
	}


    public function getUserLogin()
    {
	    return view('customers.auth.login');
    }

	public function postUserLogin(Request $request)
	{
		$this -> validate($request,
			[
				'email' => 'required',
				'password'  => 'required',
			]);

		$credentials = $request->only('email', 'password');

//		$credentials = array_add($credentials, 'confirmed', true);

//		dd($credentials);

		if (Auth::user()->attempt($credentials, $request->has('remember')))
		{
			session()->flash('info', 'Welcome Back, '.ucwords(Auth::user()->get()->name));
			return redirect()->intended('/my-profile');
		}

		return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),
					]);

	}

	private function getFailedLoginMessage()
	{
		return 'These credentials do not match our records.';
	}

	public function getLogout()
	{
		Auth::user()->logout();
		Session::flush();
		return redirect()->route('welcome');
	}

	private function loginPath()
	{
		return '/auth/login';
	}

	/**
	 * @param Request $request
	 * @return string
	 */
	public function localizePhoneNumber(Request $request)
	{
		return '+233' . substr($request->phone, 1);
	}
}
