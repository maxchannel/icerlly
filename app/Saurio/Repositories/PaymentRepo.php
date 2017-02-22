<?php

namespace Saurio\Repositories;
use Saurio\Entities\Payment;

class PaymentRepo extends BaseRepo 
{
	public function getModel()
	{
		return new Payment;
	}

}