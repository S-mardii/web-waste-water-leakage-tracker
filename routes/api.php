<?php

use Illuminate\Support\Facades\Route;

Route::post("post", "PostController@post");

Route::post("info", "PostController@info");
