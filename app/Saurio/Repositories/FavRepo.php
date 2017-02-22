<?php

namespace Saurio\Repositories;
use Saurio\Entities\Fav;

class FavRepo extends BaseRepo 
{
	public function getModel()
	{
		return new Fav;
	}

	public static function insertFav($post_id)
    {
        return Fav::insert(array(
                'user_id' => \Auth::user()->id,
                'post_id' => $post_id
        ));
    }

}