<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "MapController@imagespagination");
Route::get('/language', "MapController@languageswitcher");

Route::post('/language', array(
    'Middleware' => 'LanguageSwitcher',
    'uses' => 'MapController@switcher'
));

//Route::get('aboutus', function () {
//    return view("homepage.aboutushomepage");
//}

Route::get('aboutus', 'HomeController@aboutus');
//export
Route::get('export-file/{type}', 'ExcelController@exportFile')->name('export.file');
Route::get('download-image/{type}', 'ExcelController@downloadImage');
//end export

Route::get("/map", "MapController@index");
Route::post('/', 'MapController@search');
Route::get('/home', 'HomeController@index');
Route::get('/editprofile', 'UserController@edit');

Route::auth();

Route::get("logout", function () {
    \Auth::logout();
    return Redirect("/");
});

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