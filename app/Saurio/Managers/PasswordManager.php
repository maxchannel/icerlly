<?php

namespace Saurio\Managers;

class PasswordManager extends BaseManager
{
	public function getRules()
    {
        $rules = [
            'password'  => 'required|confirmed|between:6,20',
            'password_confirmation' => 'required'
        ];

        return $rules;
    }

}