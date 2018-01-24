<?php
/**
 * Created by PhpStorm.
 * User: yaochenfeng
 * Date: 2018/1/24
 * Time: 上午11:20
 */

namespace App\Http\Controllers\Api;

use App\Traits\RestErrorTrait;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Validator;
use Illuminate\Http\Request;
class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs,RestErrorTrait;

    /**
     * Validate the given request with the given rules.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $rules
     * @param  array  $messages
     * @param  array  $customAttributes
     * @return array
     */
    public function validate(Request $request, array $rules,
                             array $messages = [], array $customAttributes = [])
    {
        $validator = Validator::make($request->all(), $rules, $messages, $customAttributes)->validate();
        return $validator;

    }
}