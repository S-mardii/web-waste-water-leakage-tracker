<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\AreaModel;
use App\ConditionModel;
use App\PostModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class DataController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $datas = (new PostModel())->getPostPagination();

        return view('pages.data', [
            'datas'      => $datas,
            'search'     => false,
            'aboutUs'    => (new AboutUs())->getAll(),
            'conditions' => (new ConditionModel())->getConditions(),
            'areas'      => (new AreaModel())->getAreas(),
        ]);
    }

    /**
     * Search Open Data
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $condition_id = (int)$request->condition_id;
        $area_id = (int)$request->area_id;
        $from = $request->from;
        $to = $request->to;

        $pagination = (new PostModel())->search($area_id, $condition_id, $from, $to);
        $maps = collect($pagination->items());
        //set a sesstion for search
        $request->session()->put('search', [$area_id, $condition_id, $from, $to]);

        return view('pages.data', [
            'datas'      => $pagination,
            'maps'       => $maps,
            'conditions' => (new ConditionModel())->getConditions(),
            'areas'      => (new AreaModel())->getAreas(),
            'aboutUs'    => (new AboutUs())->getAll(),
            'search'     => true,
            'from'       => $from,
            'to'         => $to,
        ]);
    }

    /**
     * @param $type
     */
    public function exportFile($type)
    {
        $result = explode("-", $type);
        $type = $result[0];
        if (count($result) == 1) {
            $posts = (new PostModel())->getAllPost()->toArray();
        } else {
            $param = session()->get('search');
            $posts = (new PostModel())->getSearchAllPost($param[0], $param[1], $param[2], $param[3])->toArray();
        }

        return \Excel::create('report', function($excel) use ($posts) {
            $excel->sheet('sheet name', function($sheet) use ($posts)
            {
                $sheet->fromArray($posts);
            });
        })->download($type);
    }

    /**
     * Export JPEG image album in ZIP according to search
     *
     * @param $type
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    function downloadImages($type)
    {
        $result = explode("-", $type);
        if (count($result) == 1) {
            $posts = (new PostModel())->getAllPost();
        } else {
            $param = session()->get('search');
            $posts = (new PostModel())->getSearchAllPost($param[0], $param[1], $param[2], $param[3]);
        }

        $zip_path = 'zip/images.zip';
        if(\File::exists($zip_path)) {
            \File::delete($zip_path);  // or unlink($filename);
        }

        $files_array = [];

        foreach ($posts as $file){
            array_push($files_array, $file->image_url);
        }

        \Zipper::make(public_path($zip_path))->add($files_array)->close();

        return response()->download(public_path('zip/images.zip'));
    }
}
