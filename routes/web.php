<?php

use Illuminate\Support\Facades\Route;

// Map Route
Route::get('/', 'MapController@index')->name('map.index');

// Data Route
Route::get('/data', 'DataController@index')->name('data.index');
Route::post('/data', 'DataController@search')->name('data.search');
Route::get('/data/export/{type}', 'DataController@exportFile')->name('data.export.file');
Route::get('/data/export/images/{type}' ,'DataController@downloadImages')->name('data.download.images');

// Team Route
Route::get('/team', 'TeamController@index')->name('team.index');

// About Us page
Route::get('/about-us', 'HomeController@aboutUs')->name('about-us.index');

Route::get('/disclaimer', 'DisclaimerController@index')->name('disclaimer.index');

Route::get('/language', "MapController@languageswitcher");
Route::post('/language', array(
    'Middleware' => 'LanguageSwitcher',
    'uses' => 'MapController@switcher'
));

//export
Route::get('export-file/{type}', 'ExcelController@exportFile')->name('export.file');
Route::get('download-image/{type}', 'ExcelController@downloadImage');
//end export

//Route::get("/map", "MapController@index");
Route::post('/', 'MapController@search')->name('map.search');
Route::get('/editprofile', 'UserController@edit');

Route::auth();
//
//Route::get("logout", function () {
//    \Auth::logout();
//    return Redirect("/");
//});

Route::group(['prefix' => 'report', 'middleware' => 'auth'], function () {
    Route::get('/', "PostController@getpost");
    Route::get('/edit/{id}', "PostController@edit");
    Route::post('/update', "PostController@update");
    Route::get('/show/{id}', "PostController@show");
    Route::post("/show", "PostController@comment");
    Route::get('/delete/{id}', "PostController@delete");

    Route::post("/like", "LikeController@like");
    Route::post("/dislike", "LikeController@dislike");
});

//Report::routes();
Route::group(['prefix' => 'poster', 'middleware' => 'auth'], function () {
    Route::get('/', "PosterController@index");
    Route::get('/edit/{id}', "PosterController@edit");
    Route::post('/update', "PosterController@update");
    Route::get('/show/{id}', "PosterController@show");
    Route::get('/delete/{id}', "PosterController@delete");
});

//Setting::routes();
Route::group(['prefix' => 'setting'], function () {
    Route::get('/{id}', 'SettingController@index');
    Route::post('/status/create', "SettingController@createStatus");
    Route::get('/status/edit/{id}', "SettingController@editStatus");
    Route::get('/status/delete/{id}', "SettingController@deleteStatus");

    Route::post('/condition/create', "SettingController@createCondition");
    Route::get('/condition/edit/{id}', "SettingController@editCondition");
    Route::get('/condition/delete/{id}', "SettingController@deleteCondition");

    Route::post('/area/create', "SettingController@createArea");
    Route::get('/area/edit/{id}', "SettingController@editArea");
    Route::get('/area/delete/{id}', "SettingController@deleteArea");

    Route::post('/aboutus/create', "SettingController@createAboutUs");
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/', 'UserController@index');
    Route::post('/update', 'UserController@update');
    Route::get('/role', 'UserController@role');
});