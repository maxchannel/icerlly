<?php

use Saurio\Repositories\UserRepo;
use Saurio\Repositories\PostRepo;
use Saurio\Managers\PostManager;
use Saurio\Entities\Post;
use Saurio\Entities\Postimage;

class PostController extends BaseController
{
	protected $postRepo;

	public function __construct(PostRepo $postRepo)
	{
		$this->postRepo = $postRepo;
	}

	public function share()
	{
		$title =  "Compartir un Tweet";
		$description = $title;

		return View::make('users/share', compact('title','description'));
	}

	public function share_post()
	{
		$post = new Post();
		$post->user_id = Auth::user()->id;
		$post->content = Input::get('post');
		$manager = new PostManager($post, Input::all());
		$manager->save();

		return Redirect::route('profile',[Auth::user()->username]);
	}

	public function share_image()
	{
		$title =  "Compartir una imágen";
		$description = $title;

		return View::make('users/share_image', compact('title','description'));
	}

	public function share_image_post()
	{
		$input = Input::all();
		$rules = [
		    'file' => 'required|image|max:3000',
		    'post' => 'required|max:180',
		];
		$validation = Validator::make($input, $rules);
        
        if(!$validation->fails())
        {
        	$file = Input::file('file');
        	//Rename file
            $extension = $file->getClientOriginalExtension(); 
            $newName = str_random(20).".".$extension;

        	//Insert in posts
        	$post = new Post();
    		$post->user_id = Auth::user()->id;
    		$post->content = Input::get('post');
    		$post->save();

        	//Get post_id
        	//Insert in postimage
        	$postimage = new Postimage();
        	$postimage->post_id = $post->id;
        	$postimage->name = $newName;
        	$postimage->save();

        	//Move file to images/post
        	$file->move('images/post/', $newName);

            return Redirect::route('post',[Auth::user()->username, $post->id]);
        }else 
        {
        	return Redirect::back()->withErrors($validation)->withInput();
        }

	}

}