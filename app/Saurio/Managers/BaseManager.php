<?php

//Para validar en form y guardar info en la db

namespace Saurio\Managers;
use Saurio\Entities\Avatar;
use Saurio\Entities\User;
use Saurio\Entities\Payment;
use Saurio\Entities\Confirmations;

abstract class BaseManager
{
	protected $entity;
	protected $data;
	protected $errors;

	public function __construct($entity, $data)
	{
		$this->entity = $entity;
		$this->data = array_only($data, array_keys($this->getRules()));
	}

	abstract public function getRules();

	public function isValid()
    {
        $rules = $this->getRules();

        $validation = \Validator::make($this->data, $rules);

        if ($validation->fails())
        {
            throw new ValidationException('Validation failed', $validation->messages());
        }
    }

	public function prepareData($data)
    {
        return $data;
    }

    public function save()
    {
        $this->isValid();

        $this->entity->fill($this->prepareData($this->data));
        $this->entity->save();

        return true;
    }

    //Save solo para signup ya que requiere avatar
    public function saveUser()
    {
        $this->isValid();
        
        $user = new User;    
        $user->type = 'candidate';    
        $user->fill($this->prepareData($this->data));
        $user->save();

        $avatar = new Avatar;
        $avatar->user_id = $user->id;
        $avatar->name = 'default.png';
        $avatar->save();

        $payment = new Payment;
        $payment->user_id = $user->id;
        $payment->adsense_editor_number = '';
        $payment->save();

        $confirm = new Confirmations;
        $key = str_random(6);
        $confirm->key = $key;
        $confirm->user_id = $user->id;
        $confirm->save();

        //Emaling
        $full_name = $this->data['full_name'];
        $email = $this->data['email'];
        $params = [
            'full_name'=>$full_name, 
            'email'=>$email, 
            'key'=>$key
        ];
        \Mail::send('emails.welcome', $params, function($message) use ($full_name, $email,$key)
        {
            $message->to($email, $full_name)->subject($full_name.' bienvenido a icerlly');
        });

        //Login
        $credentials =['username'=>$this->data['username'], 'password'=>$this->data['password']];
        \Auth::attempt($credentials);

        return true;
    }

    public function confirmEmail()
    {
        $this->isValid();
        $this->entity->where('user_id',"=",$this->data['user_id'])->where('key','=',$this->data['key'])->delete();

        return true;
    }



}