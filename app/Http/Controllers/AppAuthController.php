<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthenticateUser;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AppAuthController extends Controller
{

	public function __construct()
	{

	}


	public function socialLogin(AuthenticateUser $authenticateUser, Request $request, $provider)
	{
		$hasCode = $request->has('code');
		return $authenticateUser->execute($hasCode, $provider);
	}


}
