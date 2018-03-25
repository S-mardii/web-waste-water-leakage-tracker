<?php

namespace App\Http\Controllers;

use App\PosterModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PosterController extends Controller
{
    public function index(){
        return view("users.poster", ["datas"=> (new PosterModel())->getPosters()]);
    }

    public function show($id){
        $user = DB::table('posters')->where('id', $id)->get()->first();
        return view("users.show", ["user" => $user]);
    }

    public function delete($id)
    {
        DB::table('posters')->where('id', $id)->delete();
        return Redirect("poster");
    }

    public function edit($id)
    {
        $user = DB::table('posters')->where('id', $id)->get()->first();
        return view("users.edit", ["user" => $user]);
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
        $phone = $request->phone;

        if((new PosterModel())->updatePost($id, $name, $phone) == 1)
        {
            return Redirect("poster")->with("status", "Succesfully edited!");
        }

        return Redirect("poster/edit/".$request->id)->with("status", "Faile");
    }
}
