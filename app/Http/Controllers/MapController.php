<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\AreaModel;
use App\ConditionModel;
use App\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MapController extends Controller
{
    /**
     * Display the reported Locations on Map View
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $reports = PostModel::all();
        return view('pages.map', [
            'reports' => $reports
        ]);
    }

    /**
     * Search the data for map by date
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchByDate(Request $request)
    {
        $post = new PostModel();

        $reports = $post->searchByDate($request->from, $request->to);

        return view('pages.map', [
            'reports' => $reports,
            'from'    => $request->from,
            'to'      => $request->to,
        ]);
    }

    public function imagespagination()
    {
        $datas = (new PostModel())->getPostPagination();
        $maps = collect($datas->items());
        return view('pages.map', [
            "datas"      => $datas,
            "maps"       => $maps,
            "conditions" => (new ConditionModel())->getConditions(),
            "areas"      => (new AreaModel())->getAreas(),
            "aboutUs"    => (new AboutUs())->getAll(),
            "search"     => "0"
        ]);
    }

    /**
     * Search on Map
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request) {
        $condition_id = (int)$request->condition_id;
        $area_id = (int)$request->area_id;
        $from = $request->from;
        $to = $request->to;

        $pagination = (new PostModel())->search($area_id, $condition_id, $from, $to);
        $maps = collect($pagination->items());
        //set a sesstion for search
        $request->session()->put('search', [$area_id, $condition_id, $from, $to]);

        return view('pages.map', [
            'reports' => $pagination,
            'maps' => $maps,
            'conditions' => (new ConditionModel())->getConditions(),
            'areas' => (new AreaModel())->getAreas(),
            'aboutUs' => (new AboutUs())->getAll(),
            'search' => true,
            'from' => $from,
            'to' => $to,
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