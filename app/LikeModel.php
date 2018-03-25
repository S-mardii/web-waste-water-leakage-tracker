<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeModel extends Model
{
    public function like($post_id, $user_id, $like, $dislike){

        $this->table = "likes";

        $query = [
            "post_id" =>$post_id,
            "user_id" => $user_id,
            "like" => $like,
            "dislike" => $dislike
        ];

        try{
            $this->insert($query);
            return 1;
        } catch (\Exception $error){
            $query = [
                "like" => $like,
                "dislike" => $dislike
            ];
            if ($this
                ->where("post_id", $post_id)
                ->where("user_id", $user_id)
                ->update($query)
            )
            return 1;

            return 0;
        }



    }

    public function getLike($id){
        $this->table = "likes";
        return count($this
            ->where("post_id", $id)
            ->where("like", 1)
            ->get());
    }

    public function getDislike($id){
        $this->table = "likes";
        return count($this
            ->where("dislike", 1)
            ->where("post_id", $id)
            ->get());
    }

    public function isLiked($post_id){
        $this->table = "likes";
        $data = $this
            ->where("user_id", \Auth::user()->id)
            ->where("post_id", $post_id)
            ->where("like", 1)
            ->first();

        return $data;
    }

    public function isDisliked($post_id){
        $this->table = "likes";
        $data = $this
            ->where("user_id", \Auth::user()->id)
            ->where("post_id", $post_id)
            ->where("dislike", 1)
            ->first();

        return $data;
    }
}
