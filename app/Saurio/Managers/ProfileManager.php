<?php

namespace Saurio\Managers;

class ProfileManager extends BaseManager
{
	public function getRules()
    {
        $rules = [
            'full_name' => 'required|max:40',
            'description' => 'max:200',
            'location' => 'max:27',
            'website_url' => 'url|max:60'
        ];
        //'email'     => 'required|email|unique:users,email,'.$this->entity->id,

        return $rules;
    }

    public function prepareData($data)
    {
        if ( ! isset ($data['available']))
        {
            $data['available'] = 0;
        }

        $data['full_name'] = strip_tags($data['full_name']);

        //$this->entity->slug = \Str::slug($this->entity->profile->full_name);

        return $data;
    }

}