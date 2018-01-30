<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $user = $request->user();
        $data = $request->only('nickname','qq','phone','saytext');
        $user->fill($data);
        $user->save();


        return $user;
    }
    public function updateAvatar(Request $request )
    {
        //
        $user = $request->user();
        if ($request->hasFile('file')) {
            //

            $file = $request->file('file');
            $path = $file->store('avatars',['disk'=>'public']);
            $data = ['avatar'=>$path];
            $user->fill($data);
            $user->save();
            return $user;
        }
        $this->resterror('上传图片不存在');

    }
    public function getAvatar(Request $request,$id)
    {
//        return ["userid"=>realpath(storage_path('/app/avatars/')).'/'.$id];
        //
        return response()
            ->download(realpath(storage_path('/app/avatars/')).'/'.$id, $id);
        $user = $request->user();
        if ($request->hasFile('file')) {
            //
            $file = $request->file('file');
            $path = $file->store('avatars');
            return ["file"=>$path
            ];
        }


        return $user;
    }
    public function changePwd(Request $request){

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
