<?php

namespace Saurio\Entities;

class Post extends \Eloquent 
{
	protected $fillable = ['content'];
	protected $perPage = 5;

	//Cada tuit le pertenece a un usuario
	public function user()
	{
		return $this->belongsTo('Saurio\Entities\User','user_id');
	}

	public function favs()
	{
		return $this->hasMany('Saurio\Entities\Fav','post_id');
	}

	public function images()
    {
        return $this->hasMany('Saurio\Entities\Postimage', 'post_id');
    }
	
}