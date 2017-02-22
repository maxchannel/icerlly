<?php

use Saurio\Repositories\UserRepo;
use Saurio\Repositories\PostRepo;
use Saurio\Repositories\AvatarRepo;
use Saurio\Repositories\PaymentRepo;
use Saurio\Entities\Post;
use Saurio\Entities\User;
use Saurio\Entities\Follower;

class ProfileController extends BaseController
{
	protected $profileRepo;
	protected $postRepo;

	public function __construct(UserRepo $userRepo, PostRepo $postRepo)
	{
		$this->userRepo = $userRepo;
		$this->postRepo = $postRepo;
	}

	public function show($username)
	{
		$user = $this->userRepo->findByUsername($username);
		$this->notFoundUnless($user);
		if(Auth::check())
		{
		    $ifFollow = $this->userRepo->ifFollow(Auth::user()->id, $user->id);
		}else{
			$ifFollow = "no";
		}

		return View::make('profile/show')
		           ->with('title',$user->full_name)
		           ->with('description',$user->description)
		           ->with('user', $user)
		           ->with('ifFollow', $ifFollow)
		           ->with('posts',Post::orderBy('created_at', 'desc')
                                            ->where('user_id', $user->id)
                                            ->paginate());
	}

	public function discover()
	{
		$title =  "Descubrir en Icerlly";
		$description = $title;

		return View::make('users/discover')
		           ->with('title',$title)
		           ->with('description',$description)
		           ->with('posts',Post::orderByRaw("RAND()")->paginate());
	}

	public function post($username, $id)
	{
		$user = User::where('username',$username)->first();
		$correct_id = $user->id;

		$post = $this->postRepo->find($id);
		$this->notFoundUnless($post);

		if($this->postRepo->correctUser($correct_id,$id))
		{
			$title = $post->content." - Post de ".$post->user->full_name;
		    $description = $post->content;

		    return View::make('profile/post', compact('post','title','description'));
		}else
		{
			App::abort(404);
		}

	}

	public function followers($username)
	{
		$user = $this->userRepo->findByUsername($username);
		$this->notFoundUnless($user);
		if(Auth::check())
		{
		    $ifFollow = $this->userRepo->ifFollow(Auth::user()->id, $user->id);
		}else{
			$ifFollow = "no";
		}

		return View::make('profile/followers')
		           ->with('title',$user->full_name)
		           ->with('description',$user->description)
		           ->with('user', $user)
		           ->with('ifFollow', $ifFollow)
		           ->with('followers',Follower::orderBy('created_at', 'desc')
                                            ->where('follow_to_id', $user->id)
                                            ->paginate());

	}

	public function following($username)
	{
		$user = $this->userRepo->findByUsername($username);
		$this->notFoundUnless($user);
		if(Auth::check())
		{
		    $ifFollow = $this->userRepo->ifFollow(Auth::user()->id, $user->id);
		}else{
			$ifFollow = "no";
		}

		return View::make('profile/following')
		           ->with('title',$user->full_name)
		           ->with('description',$user->description)
		           ->with('user', $user)
		           ->with('ifFollow', $ifFollow)
		           ->with('followings',Follower::orderBy('created_at', 'desc')
                                            ->where('user_id', $user->id)
                                            ->paginate());

	}

	public function share()
	{
		$user = Auth::user();
		return View::make('users/share', compact('user'));

	}

	public function share_post()
	{
		$user = Auth::user();
		$manager = new PostManager($user, Input::all());
		$manager->save();

		return Redirect::route('settings_password');
	}

}