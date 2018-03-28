<?php

namespace App\Http\Controllers;

use App\AboutUs;

class HomeController extends Controller
{
    public function aboutUs()
    {
        return view('homepage.about-us', [
            'aboutUs' => (new AboutUs())->getAll()
        ]);
    }
}
