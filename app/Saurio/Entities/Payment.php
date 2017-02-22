<?php

namespace Saurio\Entities;

class Payment extends \Eloquent 
{
	protected $fillable = ['adsense_editor_number', 'adsense_ad_id'];

	//Cada tuit le pertenece a un usuario
	public function user()
	{
		return $this->belongsTo('Saurio\Entities\User','user_id','id');
	}
	
}