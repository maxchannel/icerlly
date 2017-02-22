<?php

namespace Saurio\Entities;

class Postimage extends \Eloquent 
{
	protected $fillable = ['name'];

	public function post()
	{
		return $this->belongsTo('Saurio\Entities\Post','post_id','id');
	}
	
}