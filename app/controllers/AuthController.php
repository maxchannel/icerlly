<?php

class AuthController extends BaseController
{
	public function login()
	{
		$title =  "Iniciar Sesión";
		$description = $title;

		return View::make('users/login',compact('title','description'));
	}

	public function login_send()
	{
		$data = Input::only('username','password','remember');
		$credentials =['username'=>$data['username'], 'password'=>$data['password']];

		if(Auth::attempt($credentials,$data['remember']))
		{
			return Redirect::route('home');
		}

		return Redirect::back()->withInput()->with('login_error', 1);
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::route('home');
	}

}