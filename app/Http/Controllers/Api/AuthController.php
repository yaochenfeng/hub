<?php
/**
 * Created by PhpStorm.
 * User: yaochenfeng
 * Date: 2018/1/11
 * Time: 上午10:25
 */

namespace App\Http\Controllers\Api;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{
    function login(Request $request){
        $this->validate($request, [
            'username' => 'required|max:255',
            'password' => 'required',
        ]);
        $data =  $request->all();
        $credentials =  $request->all();

        if(Auth::validate([ 'username' => $data['username'],'password' => $data['password']]) ){
            $user = User::where('username', $data['username'])->first()->makeVisible('api_token');
            return $user;
        }else{
            return $this->renderRrror("账户信息错误");
        }



    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ],
            [
                //用‘.’定义错误所属
                'username.required'=>'用户名必须写',
                'email.required'=>'邮件?',
                'password.required'=>':attribute 不合要求'
            ]
        );
        $data =  $request->all();
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'api_token' => str_random(60)
        ])->makeVisible('api_token');


//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);
    }
}