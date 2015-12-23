<?php

namespace App;


use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;

class Staff extends Model implements AuthenticatableContract, CanResetPasswordContract
{
	use Authenticatable, CanResetPassword;

	protected $table = 'staffs';


	protected $hidden = ['password', 'remember_token'];


	/**
	 * @param $password
	 */
	public function setPasswordAttribute($password){
		$this->attributes['password'] = bcrypt($password);
	}


	protected $fillable =
	    [
		    'name',
		    'email',
		    'phone',
		    'password',
		    'role_id',
	    ];

	public function role()
	{
		return $this -> belongsTo('App\Role');
	}
}
