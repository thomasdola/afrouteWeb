<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

	/**
	 * @param $password
	 */
	public function setPasswordAttribute($password){
		$this->attributes['password'] = bcrypt($password);
	}

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'region', 'country', 'city', 'phone', 'confirmation_code'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

	public function bookings()
	{
		return $this -> hasMany('App\Booking');
	}

	public function reviews()
	{
		return $this->hasMany('App\Review');
	}

	public function payments()
	{
		return $this->hasMany('App\Payment');
	}
}
