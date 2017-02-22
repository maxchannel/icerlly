<?php

namespace Saurio\Entities;

class Avatar extends \Eloquent 
{
	protected $fillable = ['name'];

	//Cada tuit le pertenece a un usuario
	public function user()
	{
		return $this->belongsTo('Saurio\Entities\User','user_id','id');
	}
	
}