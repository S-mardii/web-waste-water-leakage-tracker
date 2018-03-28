<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\AreaModel;
use App\ConditionModel;
use App\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use function PHPSTORM_META\map;

class MapController extends Controller
{
    public function index()
    {
        $datas = (new PostModel())->getPost();
        $maps = collect($datas->items());
        return view('map', [
            "datas" => $datas,
            "maps" => $maps
        ]);
    }

    public function imagespagination()
    {
        $datas = (new PostModel())->getPostPagination();
        $maps = collect($datas->items());
        return view('homepage.map', [
            "datas"      => $datas,
            "maps"       => $maps,
            "conditions" => (new ConditionModel())->getConditions(),
            "areas"      => (new AreaModel())->getAreas(),
            "aboutUs"    => (new AboutUs())->getAll(),
            "search"     => "0"
        ]);
    }

    public function search(Request $request) {
        $condition_id = (int)$request->condition_id;
        $area_id = (int)$request->area_id;
        $from = $request->from;
        $to = $request->to;

        $pagination = (new PostModel())->search($area_id, $condition_id, $from, $to);
        $maps = collect($pagination->items());
        //set a sesstion for search
        $request->session()->put('search', [$area_id, $condition_id, $from, $to]);

        return view('homepage.map', [
            "datas" => $pagination,
            "maps" => $maps,
            "conditions" => (new ConditionModel())->getConditions(),
            "areas" => (new AreaModel())->getAreas(),
            "aboutUs" => (new AboutUs())->getAll(),
            "search" => "1"
        ]);
    }

    public function languageswitcher() {
        return view('language');
    }

    public function switcher() {

        if (!\session()->has('locale')) {
            \session()->put('locale', Input::get('locale'));
        } else {
            session()->put('language', (Input::get('locale')));
            session([
                'locale' => Input::get('locale')
            ]);
        }
        return redirect()->back();
    }
}