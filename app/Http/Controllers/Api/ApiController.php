<?php
/**
 * Created by PhpStorm.
 * User: yaochenfeng
 * Date: 2018/1/11
 * Time: 上午9:36
 */

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Exception;
class ApiController extends BaseController
{
    use  ValidatesRequests;
    public static function respondWithError($request, Exception $exception)
    {

        #错误 定制消息
        return response()->json([
//            'error'=>$exception,
            'error_code' => $exception->getCode(),
            'error_msg' => $exception->getMessage(),
        ]);
    }
    function renderRrror($msg ='错误' , $code = 202 ){
        return response()->json([
//            'error'=>$exception,
            'error_code' => $code,
            'error_msg' => $msg,
        ]);
    }

}