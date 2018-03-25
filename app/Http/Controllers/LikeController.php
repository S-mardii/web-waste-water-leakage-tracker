<?php

namespace App\Http\Controllers;

use App\LikeModel;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request){
        $post_id = $request->post_id;
        $user_id = \Auth::user()->id;


        $like = (int) $request->like;
        $dislike = 0;

        if ($like<0 || $like>1 ){
            return view("errors.500");
        }

        $status = (new LikeModel())->like($post_id, $user_id, $like, $dislike);

        return redirect()->back();

    }

    public function dislike(Request $request){
        $post_id = $request->post_id;
        $user_id = \Auth::user()->id;

        $dislike = (int) $request->dislike;
        $like = 0;

        if ($dislike < 0 || $dislike > 1){
            return view("errors.500");
        }

        $status = (new LikeModel())->like($post_id, $user_id, $like, $dislike);

        return redirect()->back();


    }
}
