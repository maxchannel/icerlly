<?php

namespace Saurio\Repositories;
use Saurio\Entities\Confirmations;

class ConfirmationsRepo extends BaseRepo 
{
	public function getModel()
	{
		return new Confirmations;
	}

	public function newConfirmation()
	{
		$confirmations = new Confirmations();
		return $confirmations;
	}

}