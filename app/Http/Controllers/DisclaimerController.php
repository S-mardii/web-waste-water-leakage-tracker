<?php

namespace App\Http\Controllers;

use App\AboutUs;

class DisclaimerController extends Controller
{
    public function index()
    {
        return view('pages.disclaimer', [
            'aboutUs'    => (new AboutUs())->getAll(),
        ]);
    }
}
