<?php

namespace Saurio\Entities;

class Profile extends \Eloquent 
{
	protected $fillable = [];

	public function posts()
	{
		return $this->hasMany('Saurio\Entities\Post','user_id');
	}

}