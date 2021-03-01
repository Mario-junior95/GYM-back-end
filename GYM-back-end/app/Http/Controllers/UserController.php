<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        if($user){
            return response()->json([
                'user' => $user
            ],200);
        }
        return response()->json([
            'message' => 'couldn\'t fetch data'
        ],401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->all();
        $user = new User;
        $user->fill($data);
        $user->save();
        if($user){
            return response()->json([
                'user' => $user
            ],200);
        }
        return response()->json([
            'message' => 'couldn\'t store data'
        ],401);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::where('id', $id )->first();
        $user->update($data);
        $user->save();
        if($user){
            return response()->json([
                'user' => $user
            ],200);
        }
        return response()->json([
            'message' => 'couldn\'t update data'
        ],401); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id' , $id)->delete();
        if($user){
            return response()->json([
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'message' => 'couldn\'t delete data'
        ]);
    }
}