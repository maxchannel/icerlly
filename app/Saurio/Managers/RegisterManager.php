<?php

namespace Saurio\Managers;

class RegisterManager extends BaseManager
{
	public function getRules()
	{
		$rules = [
		    'username' => 'required',
		    'user_id' => 'required',

		    'adsense' => 'required',
		    'full_name' => 'required|max:25',
		    'account' => 'required|max:70',
		    'telephone' => 'required|between:6,10'
		];

		return $rules;
	}

}