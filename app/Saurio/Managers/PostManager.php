<?php

namespace Saurio\Managers;

class PostManager extends BaseManager
{
	public function getRules()
    {
        $rules = [
            'post'  => 'required|max:180'
        ];

        return $rules;
    }

}