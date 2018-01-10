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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/passport', function () {
    return view('passport');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => '2',
        'redirect_uri' => 'http://127.0.0.1:8000/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('http://127.0.0.1:8000/oauth/authorize?'.$query);
});

Route::get('download',function(){

    return response()->download(realpath(base_path('public')).'/医学人工智能联盟申请表.doc', '医学人工智能联盟申请表.doc');
});