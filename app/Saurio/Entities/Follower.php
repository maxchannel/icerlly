<?php

namespace Saurio\Entities;

class Follower extends \Eloquent 
{
	protected $fillable = ['user_id','follow_to_id'];

	public function user()
	{
		return $this->belongsTo('Saurio\Entities\User','user_id');
	}

	public function following()
	{
		return $this->belongsTo('Saurio\Entities\User','follow_to_id');
	}

}