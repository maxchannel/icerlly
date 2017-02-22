<?php

use Saurio\Entities\Follower;
use Saurio\Entities\User;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$title = "Icerlly";
		$description = "Icerlly es una red social que te permite compartir mensajes directos con tus seguidores y monetizar los post.";

		if(Auth::check())
		{
			$user_id = Auth::user()->id;
		}else
		{
			$user_id = 0;
		}

		return View::make('home')
		           ->with('title',$title)
		           ->with('description',$description)
		           ->with('followings',Follower::where('user_id',$user_id)->with('following.posts')->paginate(3));
	}

}