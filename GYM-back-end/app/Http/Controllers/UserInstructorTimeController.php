<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User_Instructor_Time;

use App\Http\Requests\UserInstructorTimeRequest;

class UserInstructorTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userInstTime = User_Instructor_Time::with('user' , 'instructor' , 'time') -> get();
        if($userInstTime){
            return response()->json([
                'userInstTime' => $userInstTime
            ],200);
        }
        return response()->json([
            'message' => 'couldn\'t fetch data'
        ],401);
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
     * @param  \Illuminate\Http\UserInstructorTimeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->all();
        $userInstTime = new User_Instructor_Time;
        $userInstTime->fill($data);
        $userInstTime->save();
        if($userInstTime){
            return response()->json([
                'userInstTime' => $userInstTime
            ],200);
        }
        return response()->json([
            'message' => 'couldn\'t store data'
        ],401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $userInstTime = User_Instructor_Time::where('id', $id )->first();
        $userInstTime->update($data);
        $userInstTime->save();
        if($userInstTime){
            return response()->json([
                'userInstTime' => $userInstTime
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
        $userInstTime = User_Instructor_Time::where('id' , $id)->delete();
        if($userInstTime){
            return response()->json([
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'message' => 'couldn\'t delete data'
        ]);
    }
}
