<?php
/**
 * Created by PhpStorm.
 * User: yaochenfeng
 * Date: 2018/1/11
 * Time: 下午4:01
 */

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
class AppMobileController extends ApiController
{

    function feedback(Request $request){
        $data =  $request->all();
        return $data;
    }
}