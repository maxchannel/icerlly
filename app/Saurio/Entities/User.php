<?php

//Registro de las db

namespace Saurio\Entities;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface 
{
	protected $fillable = ['full_name','email','username','password','location','description','website_url','type'];

	public function followers()
	{
		return $this->hasMany('Saurio\Entities\Follower','follow_to_id');
	}

	public function following()
	{
		return $this->hasMany('Saurio\Entities\Follower','user_id');
	}

	public function posts()
	{
		return $this->hasMany('Saurio\Entities\Post','user_id');
	}

	public function payment()
	{
		return $this->hasOne('Saurio\Entities\Payment','user_id','id');
	}

	public function avatar()
	{
		return $this->hasOne('Saurio\Entities\Avatar','user_id','id');
	}

	//Post pagination
	public function getPaginatePostsAttribute()
	{
		return Post::where('user_id',$this->id)->paginate();
	}

	public function setPasswordAttribute($value)
    {
    	if(!empty($value))
        {
            $this->attributes['password'] = \Hash::make($value);
        }
    }

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}