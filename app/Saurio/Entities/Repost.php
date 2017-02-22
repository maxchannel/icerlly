<?php

namespace Saurio\Entities;

class Repost extends \Eloquent 
{
	protected $fillable = ['post_id','user_id'];

	public function user()
	{
		return $this->belongsTo('Saurio\Entities\User','user_id');
	}

	public function post()
	{
		return $this->belongsTo('Saurio\Entities\User','post_id');
	}

}