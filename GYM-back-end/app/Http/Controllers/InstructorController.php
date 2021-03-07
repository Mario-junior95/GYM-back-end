<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Instructor;

use App\Helpers\Helpers;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructor = Instructor::all();
        if($instructor){
            return response()->json([
                'instructor' => $instructor
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
        $instructor = new Instructor;
        $instructor->fill($data);
        if($data['image'] === "null"){
            unset($data['image']);
       }else{
           $instructor->image = custom_image($request);
       }
        $instructor->save();
        if($instructor){
            return response()->json([
                'instructor' => $instructor
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
        $instructor = Instructor::where('id', $id )->first();
        $instructor->update($data);
        if($data['image'] === "null"){
            unset($data['image']);
            $instructor->update($data);
       }else{
           $instructor->update($data);
           $instructor->image = custom_image($request);
       }
        $instructor->save();
        if($instructor){
            return response()->json([
                'instructor' => $instructor
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
        $instructor = Instructor::where('id' , $id)->delete();
        if($instructor){
            return response()->json([
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'message' => 'couldn\'t delete data'
        ]);
    }
}
