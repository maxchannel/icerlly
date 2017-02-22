<?php

namespace Saurio\Repositories;
use Saurio\Entities\Apply;

class ApplyRepo extends BaseRepo 
{
	public function getModel()
	{
		return new Apply;
	}

	public function newApply()
	{
		$apply = new Apply();
		return $apply;
	}
}