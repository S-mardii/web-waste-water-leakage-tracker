<?php

namespace App\Http\Controllers;

use App\PostModel;
use Chumper\Zipper\Zipper;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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

    function downloadImage($type)
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
