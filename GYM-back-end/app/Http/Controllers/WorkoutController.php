<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Workout;

use App\Helpers\Helpers;

use App\Http\Requests\WorkoutRequest;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workout = Workout::all();
        if($workout){
            return response()->json([
                'workout' => $workout
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->all();
        $workout = new Workout;
        $workout->fill($data);
    //     if($data['image'] === "null"){
    //         unset($data['image']);
    //    }else{
           $workout->image = custom_image($request);
    //    }
        $workout->save();
        if($workout){
            return response()->json([
                'workout' => $workout
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
        $workout = Workout::where('id', $id )->first();
        if($workout){
            return response()->json([
                'workout' => $workout
            ],200);
        }
        return response()->json([
            'message' => 'couldn\'t fetch data'
        ],401);
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
     * @param  \Illuminate\Http\WorkoutRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkoutRequest $request, $id)
    {
        $data = $request->all();
        $workout = Workout::where('id', $id )->first();
        $workout->update($data);
        if($data['image'] === "null"){
            unset($data['image']);
            $workout->update($data);
       }else{
           $workout->update($data);
           $workout->image = custom_image($request);
       }
        $workout->save();
        if($workout){
            return response()->json([
                'workout' => $workout
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
        $workout = Workout::where('id' , $id)->delete();
        if($workout){
            return response()->json([
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'message' => 'couldn\'t delete data'
        ]);
    }
}
