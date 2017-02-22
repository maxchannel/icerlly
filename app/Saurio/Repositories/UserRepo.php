<?php

namespace Saurio\Repositories;
use Saurio\Entities\User;
use Saurio\Entities\Follower;

class UserRepo extends BaseRepo 
{
	public function getModel()
	{
		return new User;
	}

	public function newUser()
	{
		$user = new User();
		$user->type = 'candidate';
		return $user;
	}

	public function findByUsername($username)
	{
		return $this->model->where('username', '=', $username)->first();
	}

	public function ifFollow($visitor,$user_id)
	{
		if(Follower::where('user_id', '=', $visitor)->where('follow_to_id', '=', $user_id)->exists())
		{
			return true;
		}else
		{
			return false;
		}
	}

}