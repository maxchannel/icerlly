<?php

namespace Saurio\Managers;

class PaymentManager extends BaseManager
{
	public function getRules()
    {
        $rules = [
            'adsense_editor_number'  => 'required|max:50',
            'adsense_ad_id'  => 'required|max:50'
        ];

        return $rules;
    }

}