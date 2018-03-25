<?php

namespace App\Http\Controllers;

use App\ConditionModel;
use App\LikeModel;
use App\PostModel;
use App\StatusModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use Request as ImageReceive;
class PostController extends Controller
{
    public function post(Request $request)
    {
        $poster_id = $request->has("poster_id")? $request->poster_id : 0;
        $description = $request->description;
        $lat = $request->lat;
        $lng = $request->lng;
        $area_id = (int) $request->area_id;
        $condition_id = (int) $request->condition_id;
        if (ImageReceive::file("image") && ImageReceive::file("image")->isValid())
            $image_url = "images/" . $this->uploadImage(ImageReceive::file("image"));

        return (new PostModel())->post($description, $lat, $lng, $image_url, $area_id, $poster_id, $condition_id);
    }

    public function uploadImage($image)
    {
        $date = date("Ym");
        $dir = public_path("images/");
        $image_name = uniqid($date) . '.' . $image->getClientOriginalExtension();

        if ($image->move($dir, $image_name)) {
            return $image_name;
        }

        return null;

    }

    public function getpost(){
        return view("reports.report", [
            "datas"=> (new PostModel())->getPost()
        ]);
    }

    public function show($id)
    {
        $comments = (new PostModel())->getComments($id);
        $post_deatils = (new PostModel())->show($id);
        $isLiked = (new LikeModel())->isLiked($id);
        $isDislike = (new LikeModel())->isDisliked($id);
        $getLike = (new LikeModel())->getLike($id);
        $getDislike = (new LikeModel())->getDislike($id);

        return view("reports.show", [
            "post" => $post_deatils,
            "comments" => $comments,
            "isliked" => $isLiked,
            "isdisliked" => $isDislike,
            "getlike" => $getLike,
            "getdislike" =>$getDislike
        ]);
    }

    public function comment(Request $request)
    {
        $post_id = $request->post_id;
        $comment = $request->comment;
        $result = (new PostModel())->comment($post_id, \Auth::user()->id, $comment);

        header("Refresh:0; url=/report/show/" . $post_id);

    }

    public function delete($id)
    {
        if ((new PostModel())->deletePost($id) == 1) {
            return Redirect("report")->with("status", "Successfully edited!");
        }

        redirect('report')->with("status", "Failed");
        return Redirect("report");
    }

    public function edit($id)
    {

        if (\Auth::check() && \Auth::user()->role_id > 2) {
            return view("errors.401");
        }
        return view("reports.edit", [
            "post" => (new PostModel())->edit($id),
            "conditions" => (new ConditionModel())->getConditions(),
            "statuss" => (new StatusModel())->getStatus()
        ]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $description = $request->description;
        $img_url = $request->img_url;
        $lat = $request->lat;
        $long = $request->lng;
        $area_id = $request->area_id;
        $condition_id = $request->condition_id;
        $status = $request->status;
//        if (ImageReceive::file("image") && ImageReceive::file("image")->isValid())
//            $image_url = "images/" . $this->uploadImage(ImageReceive::file("image"));

        if ((new PostModel())->updatePost($id, $description, $lat, $long, $img_url, $area_id, $condition_id, $status) == 1) {
            return Redirect("report")->with("status", "Successfully edited!");
        }

        redirect('report')->with("status", "Failed");
    }

    public function info(){
        return (new PostModel())->getInfo();
    }
}
