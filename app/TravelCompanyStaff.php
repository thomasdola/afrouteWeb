<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;

class TravelCompanyStaff extends Model implements AuthenticatableContract, CanResetPasswordContract
{

	use Authenticatable, CanResetPassword;

	protected $table = 'travel_company_staffs';

	/**
	 * @param $password
	 */
	public function setPasswordAttribute($password){
		$this->attributes['password'] = bcrypt($password);
	}


	protected $hidden = ['password', 'remember_token'];

    protected $fillable =
	    [
		    'name',
		    'username',
		    'email',
		    'phone',
		    'password',
		    'type',
		    'travel_company_id',
	    ];


	public function travel_company()
	{
		return $this -> belongsTo('App\TravelCompany');
	}
}
