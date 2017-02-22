<?php

namespace Saurio\Repositories;
use Saurio\Entities\Avatar;

class AvatarRepo extends BaseRepo 
{
	public function getModel()
	{
		return new Avatar;
	}

	public function newAvatar()
	{
		$avatar = new Avatar();
		return $avatar;
	}

	public function findByUserID($user_id)
	{
		return $this->model->where('user_id', '=', $user_id)->first();
	}

}