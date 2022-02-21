<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends ApiController
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

//        $data->each(function($item){
//            $item->setAppends(['full_name']);
//        });
        $data->each->setAppends(['full_name']);

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
        $validator = Validator::make($request->all(),[
           'name'=>'required|string|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:4'
        ]);

        if ($validator->fails())
            return $this->apiResponse(ResultType::Error,$validator->errors(),"Validation fails",400);

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

    public function custom1(){
        // Bir dəyər qaytaranda
//        $user2= User::find(2);
//        return new UserResource($user2);

       /* Birdən çox dəyər üçün */
         $users= User::all();
         //return UserResource::collection($users);

        return UserResource::collection($users)->additional([
            'meta' =>[
                'total_user'=>$users->count(),
                'custom'=>'value'
        ]
        ]);

    }
}
