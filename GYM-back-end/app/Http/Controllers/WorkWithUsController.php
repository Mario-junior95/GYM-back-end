<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\WorkWithUs;

use App\Helpers\Helpers;

use App\Http\Requests\WorkWithUsRequest;

class WorkWithUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workwithus = WorkWithUs::all();
        if($workwithus){
            return response()->json([
                'workwithus' => $workwithus
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
     * @param  \Illuminate\Http\WorkWithUsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkWithUsRequest $request)
    {
        $data =  $request->all();
        $workwithus = new WorkWithUs;
        $workwithus->fill($data);
        
        $workwithus->image = custom_image($request);
  
        $workwithus->save();
        if($workwithus){
            return response()->json([
                'workwithus' => $workwithus
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
        $workwithus = WorkWithUs::where('id', $id )->first();
    
        if($data['image'] === "null"){
            unset($data['image']);
           $workwithus->update($data);
       }else{
           $workwithus->update($data);
           $workwithus->image = custom_image($request);
       }
        $workwithus->save();
        if($workwithus){
            return response()->json([
                'workwithus' => $workwithus
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
        $workwithus = WorkWithUs::where('id' , $id)->delete();
        if($workwithus){
            return response()->json([
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'message' => 'couldn\'t delete data'
        ]);
    }
}
