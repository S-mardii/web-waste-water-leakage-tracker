<?php

namespace App\Http\Controllers;

use App\AboutUsModel;
use App\AreaModel;
use App\ConditionModel;
use App\StatusModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index($id)
    {
        if (\Auth::check() && \Auth::user()->role_id == 1)

        return view('settings.index', [
            "status" => (new StatusModel())->getStatus(),
            "areas" => (new AreaModel())->getAreas(),
            "conditions" => (new ConditionModel())->getConditions(),
            "aboutus" => (new AboutUsModel())->getAll(),
            "id" => $id
        ]);

        return view("errors.401");
    }

    /**
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function createStatus(Request $request)
    {
        $status = $request->status;
        if ($request->editedvalueid != '') {
            $id = $request->editedvalueid;
            if((new StatusModel())->updateStatus($id, $status) == 1)
            {
                return Redirect("setting/1")->with("status", "Succesfully updated!");
//                return view("setting")
            }

            return Redirect("setting/1".$request->id)->with("status", "Faile");
        }else {
            if((new StatusModel())->createStatus($status) == 1)
            {
                return Redirect("setting/1")->with("status", "Succesfully saved!");
            }

            return Redirect("setting/1".$request->id)->with("status", "Faile");
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function createCondition(Request $request)
    {
        $condition = $request->condition;
        $color = $request->color;
        if ($request->conditionvalueid != '') {
            $id = $request->conditionvalueid;
            if((new ConditionModel())->updateCondition($id, $condition, $color) == 1)
            {
                return Redirect("setting/3")->with("status", "Succesfully updated!");
            }

            return Redirect("setting/3".$request->id)->with("status", "Faile");
        }else {
            if((new ConditionModel())->createCondition($condition, $color) == 1)
            {
                return Redirect("setting/3")->with("status", "Succesfully saved!");
            }

            return Redirect("setting/3".$request->id)->with("status", "Faile");
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function createArea(Request $request)
    {
        $area = $request->area;
        if ($request->areavalueid != '') {
            $id = $request->areavalueid;
            if((new AreaModel())->updateArea($id, $area) == 1)
            {
                return Redirect("setting/2")->with("status", "Succesfully updated!");
            }

            return Redirect("setting/2".$request->id)->with("status", "Faile");
        }else {
            if((new AreaModel())->createArea($area) == 1)
            {
                return Redirect("setting/2")->with("status", "Succesfully saved!");
            }

            return Redirect("setting/2".$request->id)->with("status", "Faile");
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function createAboutUs(Request $request)
    {
        $aboutus = $request->aboutus;
        $disclaimer = $request->disclaimer;
        $aboutUsObj = new AboutUsModel();
        if($aboutUsObj->updateAboutus($aboutus, $disclaimer) == 1)
        {
            return Redirect("setting/4")->with("status", "Succesfully updated!");
        }
        return Redirect("setting/4")->with("status", "Faile");
    }

//    public function editStatus($id)
//    {
//        $user = DB::table('status')->find($id);
//        return view("users.edit", ["user" => $user]);
//    }

//    /**
//     * @param $id
//     * @param Request $request
//     * @return Response
//     */
//    public function updateStatus(Request $request)
//    {
//        $id = $request->id;
//        $name = $request->name;
//        $phone = $request->phone;
//
//        if((new PosterModel())->updatePost($id, $name, $phone) == 1)
//        {
//            return Redirect("poster")->with("status", "Succesfully edited!");
//        }
//
//        return Redirect("poster/edit/".$request->id)->with("status", "Faile");
//    }
    public function deleteCondition($id)
    {
        DB::table('conditions')->where('id', $id)->delete();
        return Redirect("setting/3");
    }

    public function deleteArea($id)
    {
        DB::table('areas')->where('id', $id)->delete();
        return Redirect("setting/2");
    }

    public function deleteStatus($id)
    {
        DB::table('status')->where('id', $id)->delete();
        return Redirect("setting/1");
    }
}
