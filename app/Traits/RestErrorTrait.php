<?php
/**
 * Created by PhpStorm.
 * User: yaochenfeng
 * Date: 2018/1/24
 * Time: 上午11:22
 */

namespace App\Traits;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
trait RestErrorTrait
{
    public function restrender($request, Exception $e)
    {
        if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            return response()->json([
                    'error_msg' => 'Resource not found',
                    'error_code' => Response::HTTP_NOT_FOUND
                ], Response::HTTP_NOT_FOUND);
        } elseif ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return response()->json([
                    'error_msg' => 'Endpoint not found',
                    'error_code' => Response::HTTP_NOT_FOUND
                ], Response::HTTP_NOT_FOUND);
        } elseif ($e instanceof ValidationException) {
            $msg = 'data not valid';
            foreach ($e->errors() as $key => $value) {
                $msg = $value;
                break;
            }
            return response()->json([
                    'error_msg' =>   $msg,
                    'error_code' => Response::HTTP_NOT_FOUND
                ], Response::HTTP_NOT_FOUND);
        }



        return response()->json([
                'error_msg' => $e->getMessage(),
                'error_code' => Response::HTTP_BAD_REQUEST
            ], Response::HTTP_BAD_REQUEST);
    }
}