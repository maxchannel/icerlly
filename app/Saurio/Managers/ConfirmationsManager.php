<?php

namespace Saurio\Managers;

class ConfirmationsManager extends BaseManager
{
	public function getRules()
    {
        $rules = [
            'key' => 'required',
            'user_id' => 'required'
        ];

        return $rules;
    }

}