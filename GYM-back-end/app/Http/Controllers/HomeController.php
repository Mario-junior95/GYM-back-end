<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Home;

use App\Http\Requests\HomeRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = Home::all();
        if($home){
            return response()->json([
                'home' => $home
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
     * @param  \Illuminate\Http\HomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeRequest $request)
    {
        $data =  $request->all();
        $home = new Home;
        $home->fill($data);
        
        $home->image = custom_image($request);
  
        $home->save();
        if($home){
            return response()->json([
                'home' => $home
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
     * @param  \Illuminate\Http\HomeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HomeRequest $request, $id)
    {
        $data = $request->all();
        $home = Home::where('id', $id )->first();
    
        if($data['image'] === "null"){
            unset($data['image']);
           $home->update($data);
       }else{
           $home->update($data);
           $home->image = custom_image($request);
       }
        $home->save();
        if($home){
            return response()->json([
                'home' => $home
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
        $home = Home::where('id' , $id)->delete();
        if($home){
            return response()->json([
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'message' => 'couldn\'t delete data'
        ]);
    }
}
