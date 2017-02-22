<?php

namespace Saurio\Managers;

class AvatarManager extends BaseManager
{
	public function getRules()
    {
        $rules = [
            'file' => 'required|image|size:5000'
        ];

        return $rules;
    }

}