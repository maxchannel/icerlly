<?php

namespace Saurio\Entities;

class Confirmations extends \Eloquent 
{
	protected $fillable = ['key','user_id'];

	public function user()
	{
		return $this->belongsTo('Saurio\Entities\User','user_id');
	}

}