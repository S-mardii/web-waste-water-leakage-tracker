<?php

namespace App\Http\Controllers;

use App\AboutUs;

class TeamController extends Controller
{
    public function index()
    {
        return view('pages.data', [
            'aboutUs' => (new AboutUs())->getAll()
        ]);
    }
}
