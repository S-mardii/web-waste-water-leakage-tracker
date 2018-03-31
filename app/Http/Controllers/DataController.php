<?php

namespace App\Http\Controllers;

use App\AboutUs;

class DataController extends Controller
{
    public function index()
    {
        return view('pages.data', [
            'aboutUs' => (new AboutUs())->getAll()
        ]);
    }
}
