<?php

namespace Saurio\Repositories;
use Saurio\Entities\Repost;

class RepostRepo extends BaseRepo 
{
	public function getModel()
	{
		return new Repost;
	}

	public static function insertRepost($post_id)
    {
        return Repost::insert(array(
                'user_id' => \Auth::user()->id,
                'post_id' => $post_id
        ));
    }

}