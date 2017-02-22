<?php

namespace Saurio\Repositories;
use Saurio\Entities\Follower;

class FollowerRepo extends BaseRepo 
{
	public function getModel()
	{
		return new Follower;
	}

	public static function insertFollower($user_id,$follow_to_id)
    {
        return Follower::insert(array(
                'user_id' => $user_id,
                'follow_to_id' => $follow_to_id
        ));
    }

}