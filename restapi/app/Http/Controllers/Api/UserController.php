<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $offset = $request->has('offset') ? $request->query('offset') : 0;
        $limit = $request->has('limit') ? $request->query('limit') : 10;

        $qb=User::query();
        if ($request->has('q'))
            $qb->where('name','like','%'.$request->query('q').'%');
        if($request->has('sortBy'))
            $qb->orderBy($request->query('sortBy'),$request->query('sort','DESC'));

        $data = $qb->offset($offset)->limit($limit)->get();
        return response($data,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = new  User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =bcrypt($request->password);
        $user->save();
        return response([
            'data'=>$user,
            'message'=>"User created"
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return Response
     */
    public function show(User $user)
    {
        return response($user,200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();

        return response([
            'data'=>$user,
            'message'=>'User updated'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response([
            'message'=>'User deleted'
        ],200);
    }
}
