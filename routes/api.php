<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/', function (Request $request) {
    return Auth::guard('api')->user();
});
//Route::get('profile', 'UserController@show')；
Route::namespace('Api')->group(function () {
    // 在 "App\Http\Controllers\Admin" 命名空间下的控制器
    Route::post('user/login', 'AuthController@login');
    Route::post('user/register', 'AuthController@create');
    Route::post('app/feedback', 'AppMobileController@feedback');



    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        Route::post('me/profile', 'MeController@update');
    });
});
