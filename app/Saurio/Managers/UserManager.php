<?php

namespace Saurio\Managers;

class UserManager extends BaseManager
{
	public function getRules()
    {
        $rules = [
            'full_name' => 'required|max:40',
            'email'     => 'required|email|max:60|unique:users,email',
            'username' => 'required|alpha_num|max:30|unique:users,username',
            'password'  => 'required|between:6,20'
        ];

        return $rules;
    }
}