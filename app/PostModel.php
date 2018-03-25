<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    public function getPost(){
        $this->table = "post";
        return $this
            ->join("status", "post.status_id", "=", "status.id")
            ->join("areas", "areas.id", "=", "post.area_id")
            ->join("conditions", "post.condition_id", "=", "conditions.id")
            ->select("post.*", "status.status", "areas.area", "conditions.condition", "conditions.color")
            ->where("show", 1)
            ->orderBy("id", "desc")
            ->paginate(15);
    }

    public function getAllPost(){
        $this->table = "post";
        return $this
            ->join("status", "post.status_id", "=", "status.id")
            ->join("areas", "areas.id", "=", "post.area_id")
            ->join("conditions", "post.condition_id", "=", "conditions.id")
            ->select("post.id", "post.poster_id", "post.description","post.image_url","post.lat", "post.lng","status.status",
                "areas.area", "conditions.condition", "post.created_at")
            ->get();
    }

    public function getPostPagination(){
        $this->table = "post";
        return $this
            ->join("conditions", "post.condition_id", "=", "conditions.id")
            ->select("post.*", "conditions.condition", "conditions.color")
            ->paginate(10);
    }

    public function post($description, $lat, $lng, $image_url, $area_id, $poster_id, $condition_id){

        $this->table = "post";
        $this->timestamps = true;
        $this->area_id = $area_id;
        $this->poster_id = $poster_id;
        $this->description = $description;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->image_url = $image_url;
        $this->condition_id = $condition_id;
        $json["status"] = 0;

        if ($this->save()){
            $json['status'] = 1;
        }

        return json_encode($json);
    }

    public function updatePost($id, $description, $lat, $lng, $image_url, $area_id, $condition_id, $status)
    {
        $this->table = "post";
        $query = [
            "id" => $id,
            "lat" => $lat,
            "lng" => $lng,
            "image_url" => $image_url,
            "area_id" => $area_id,
            "description" => $description,
            "condition_id" => $condition_id,
            "status_id" => $status
        ];



        if ($this->where("id", $id)
            ->update($query)) {

            return 1;
        }

        return 0;
    }

    public function deletePost($id)
    {
        $this->table = "post";
        $query = [
            "show" => 0
        ];



        if ($this->where("id", $id)
            ->update($query)) {

            return 1;
        }

        return 0;
    }

    public function edit($id){
        $this->table = "post";
        return $this
            ->join("status", "post.status_id", "=", "status.id")
            ->join("areas", "areas.id", "=", "post.area_id")
            ->join("conditions", "post.condition_id", "=", "conditions.id")
            ->select("post.*", "status.status", "areas.area", "conditions.condition")
            ->where("post.id", $id)
            ->first();
    }

    public function show($id){
        $this->table = "post";
        return $this
            ->join("status", "post.status_id", "=", "status.id")
            ->join("areas", "areas.id", "=", "post.area_id")
            ->join("conditions", "condition_id", "=", "conditions.id")
            ->select("post.*", "status.status", "areas.area", "conditions.condition")
            ->where("post.id", $id)
            ->first();
    }

    public function getComments($id){
        $this->table = "comments";
        return $this
            ->where("comments.post_id", $id)
            ->join("users", "comments.user_id", "=" ,"users.id")
            ->join("roles", "roles.id", "=", "users.role_id")
            ->orderBy("id", "desc")
            ->select("comments.*", "users.name", "roles.role")
            ->get();

    }

    public function comment($post_id, $user_id, $comment){
        $this->table = "comments";
        $this->user_id = $user_id;
        $this->comment = $comment;
        $this->post_id = $post_id;

        if ($this->save()){
            return 1;
        } return 0;

    }

    public function getInfo(){

        $data = array();
        $json = array();
        $json ["status"] = 0;
        $this->table = "conditions";
        $data["conditions"] = $this->get();
        $this->table = "areas";
        $data["areas"] =$this->get();
        $json["data"] = $data;
        $json["status"] =1;
        $json["message"] = "Request successful!!!";
        return json_encode($json);

    }

    public function search($area_id, $condition_id ,$from, $to){
        $this->table = "post";
        $area_con = $area_id == 0? "!=" : "=";
        $condition_con = $condition_id == 0? "!=" : "=";

        return $this
            ->join("conditions", "conditions.id", "=", "post.condition_id")
            ->where("post.area_id", $area_con, $area_id)
            ->where("post.condition_id", $condition_con, $condition_id)
            ->whereDate('post.created_at', ">=", $from)
            ->whereDate('post.created_at', "<=", $to)
            ->select("post.*", "conditions.color")
            ->paginate(10);
    }

    public function getSearchAllPost($area_id, $condition_id ,$from, $to){
        $this->table = "post";
        $area_con = $area_id == 0? "!=" : "=";
        $condition_con = $condition_id == 0? "!=" : "=";

        return $this
            ->join("conditions", "conditions.id", "=", "post.condition_id")
            ->join("status", "status.id", "=", "post.status_id")
            ->join("areas", "areas.id", "=", "post.area_id")
            ->where("post.area_id", $area_con, $area_id)
            ->where("post.condition_id", $condition_con, $condition_id)
            ->whereDate('post.created_at', ">=", $from)
            ->whereDate('post.created_at', "<=", $to)
            ->select("post.id", "post.poster_id", "post.description","post.image_url","post.lat", "post.lng","status.status",
                "areas.area", "conditions.condition", "post.created_at")
            ->get();
    }

}
