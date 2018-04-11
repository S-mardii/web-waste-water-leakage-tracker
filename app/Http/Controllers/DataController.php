<?php

namespace App\Http\Controllers;

use App\PostModel;
use App\Repositories\ReportRepository;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * @var ReportRepository
     */
    protected $reports;

    /**
     * DataController constructor.
     *
     * @param ReportRepository $reports
     */
    public function __construct(ReportRepository $reports)
    {
        $this->reports = $reports;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $reportList = [
            'Low'     => [],
            'Medium'  => [],
            'Serious' => []
        ];

        foreach ($reportList as $condition => $report) {
            $report = $this->reports->getByConditionName($condition)->get();
            $reportList[$condition]['data'] = $report;
        }

        return view('pages.data', [
            'datas'  => $reportList,
            'search' => false
        ]);
    }

    /**
     * Search the reports (based on date)
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $reportList = [
            'Low'     => [],
            'Medium'  => [],
            'Serious' => []
        ];

        $from = $request['from'];
        $to = $request['to'];

        foreach ($reportList as $condition => $report) {
            $report = $this->reports->searchBetweenDate($from, $to);
            $report = $this->reports->getByConditionName($condition, $report);
            $reportList[$condition]['data'] = $report;
        }

        return view('pages.data', [
            'datas'  => $reportList,
            'search' => true,
            'from'   => $from,
            'to'     => $to
        ]);
    }

//    /**
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
//     */
//    public function index()
//    {
//        $datas = (new PostModel())->getPostPagination();
//
//        return view('pages.data', [
//            'datas'      => $datas,
//            'search'     => false,
//            'aboutUs'    => (new AboutUs())->getAll(),
//            'conditions' => (new ConditionModel())->getConditions(),
//            'areas'      => (new AreaModel())->getAreas(),
//        ]);
//    }

//    /**
//     * Search Open Data
//     *
//     * @param Request $request
//     *
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
//     */
//    public function search(Request $request)
//    {
//        $condition_id = (int)$request->condition_id;
//        $area_id = (int)$request->area_id;
//        $from = $request->from;
//        $to = $request->to;
//
//        $pagination = (new PostModel())->search($area_id, $condition_id, $from, $to);
//        $maps = collect($pagination->items());
//        //set a sesstion for search
//        $request->session()->put('search', [$area_id, $condition_id, $from, $to]);
//
//        return view('pages.data', [
//            'datas'      => $pagination,
//            'maps'       => $maps,
//            'conditions' => (new ConditionModel())->getConditions(),
//            'areas'      => (new AreaModel())->getAreas(),
//            'aboutUs'    => (new AboutUs())->getAll(),
//            'search'     => true,
//            'from'       => $from,
//            'to'         => $to,
//        ]);
//    }

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
