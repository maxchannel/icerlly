<?php

namespace Saurio\Repositories;
use Saurio\Entities\Post;
use Saurio\Entities\Fav;
use Saurio\Entities\Repost;

class PostRepo extends BaseRepo 
{
	public function getModel()
	{
		return new Post;
	}

	public function ifFav($user_id,$post_id)
    {
        if(Fav::where('user_id', '=', $user_id)->where('post_id', '=', $post_id)->exists())
        {
            return true;
        }else
        {
            return false;
        }
    }

    public function ifRepost($user_id,$post_id)
    {
        if(Repost::where('user_id', '=', $user_id)->where('post_id', '=', $post_id)->exists())
        {
            return true;
        }else
        {
            return false;
        }
    }

    //Para solo mostrar post de usuarios que lo crearon
    public function correctUser($user_id,$post_id)
    {
        if(Post::where('id', '=', $post_id)->where('user_id', '=', $user_id)->exists())
        {
            return true;
        }
    }

}