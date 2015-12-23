<?php
/**
 * Created by PhpStorm.
 * User: THOMAS
 * Date: 7/18/2015
 * Time: 2:10 PM
 */

namespace App\Http\Controllers\Auth;


use App\Repositories\UserRepository;
use Laravel\Socialite\Contracts\Factory as Socialite;

class AuthenticateUser {

	/**
	 * @var Socialite
	 */
	private $socialite;
	/**
	 * @var UserRepository
	 */
	private $users;


	public function __construct(Socialite $socialite, UserRepository $users)
	{

		$this->socialite = $socialite;
		$this->users = $users;
	}

	/**
	 * @param $hasCode
	 *
	 * @param $provider
	 *
	 * @return mixed
	 */
	public function execute($hasCode, $provider)
	{
		if( ! $hasCode ) return $this->getAuthorisationFirst($provider);
		$user = $this->getSocialUser($provider);
//		$user = $this->users->findByUserNameOrCreate(getSocialUser($provider));
//		$this->auth->login($user, true);
		dd($user);
	}

	/**
	 * @param $provider
	 *
	 * @return \Laravel\Socialite\Contracts\Provider
	 */
	private function getAuthorisationFirst($provider)
	{
		return $this->socialite->driver($provider)->redirect();
	}

	/**
	 * @param $provider
	 *
	 * @return \Laravel\Socialite\Contracts\User
	 */
	private function getSocialUser($provider)
	{
		return $this->socialite->driver($provider)->user();
	}
} 