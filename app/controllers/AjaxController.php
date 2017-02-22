<?php

use Saurio\Entities\Follower;
use Saurio\Entities\Fav;
use Saurio\Entities\Repost;
use Saurio\Entities\Partner;
use Saurio\Entities\Apply;
use Saurio\Entities\Payment;

class AjaxController extends BaseController 
{

    public function search()
    {
        $username = Input::get('username');
        $users = Saurio\Entities\User::where('username','LIKE', '%'.$username.'%')->orWhere('full_name','LIKE', '%'.$username.'%')->take(20)->get();
        return Response::json($users);   
    }

    public function search_t()
    {
        $query = Input::get('query');
        $posts = Saurio\Entities\Post::where('content','LIKE', '%'.$query.'%')->take(20)->with('user')->get();
        return Response::json($posts); 
    }

    public function follow()
    {
        $user_id = Input::get('user_id');
        $follow_to_id = Input::get('follow_to_id');    

        $follow = new Follower;
        $follow->user_id = $user_id;
        $follow->follow_to_id = $follow_to_id;
        $follow->save();
        
        return Response::json(['success' => true, 'message' => 'Follow now!']);
    }

    public function unfollow()
    {
        $user_id = Input::get('user_id');
        $follow_to_id = Input::get('follow_to_id');     

        $follow = new Follower;
        $follow->where('user_id', '=', $user_id)->where('follow_to_id', '=', $follow_to_id)->delete();
        
        return Response::json(['success' => true, 'message' => 'Unfollow now!']);
    }

    public function fav()
    {
        $user_id = Input::get('user_id');
        $post_id = Input::get('post_id');    

        $follow = new Fav;
        $follow->user_id = $user_id;
        $follow->post_id = $post_id;
        $follow->save();
        
        return Response::json(['success' => true, 'message' => 'Faved now!']);
    }

    public function unfav()
    {
        $user_id = Input::get('user_id');
        $post_id = Input::get('post_id');     

        $follow = new Fav;
        $follow->where('user_id', '=', $user_id)->where('post_id', '=', $post_id)->delete();
        
        return Response::json(['success' => true, 'message' => 'Unfaved now!']);
    }

    public function repost()
    {
        $user_id = Input::get('user_id');
        $post_id = Input::get('post_id');    

        $follow = new Repost;
        $follow->user_id = $user_id;
        $follow->post_id = $post_id;
        $follow->save();
        
        return Response::json(['success' => true, 'message' => 'Repost now!']);
    }

    public function unrepost()
    {
        $user_id = Input::get('user_id');
        $post_id = Input::get('post_id');     

        $follow = new Repost;
        $follow->where('user_id', '=', $user_id)->where('post_id', '=', $post_id)->delete();
        
        return Response::json(['success' => true, 'message' => 'Unrepost now!']);
    }

    public function xCode()
    {
        $user_id = Input::get('user_id');   
        $apply_id = Input::get('apply_id');   

        $partner = new Partner;
        $partner->user_id = $user_id;
        $partner->save();
        
        Apply::destroy($apply_id);
        
        return Response::json(['success' => true, 'message' => 'Follow now!']);
    }

    public function numbA()
    {
        $editor_number = Input::get('editor_number');   

        $payment = Payment::find($editor_number);
        $payment->approved = 1;
        $payment->save();
        
        return Response::json(['success' => true, 'message' => 'Follow now!']);
    }

}