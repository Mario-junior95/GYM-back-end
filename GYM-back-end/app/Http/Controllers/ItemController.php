<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

use App\Http\Requests\ShopRequest;

use App\Helpers\Helpers;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Item::all();
        if($item){
            return response()->json([
                'item' => $item
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
     * @param  \Illuminate\Http\ShopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopRequest $request)
    {
        $data =  $request->all();
        $item = new Item;
        $item->fill($data);
        
        $item->image = custom_image($request);
  
        $item->save();
        if($item){
            return response()->json([
                'item' => $item
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
    public function update(ShopRequest $request, $id)
    {
        $data = $request->all();
        $item = Item::where('id', $id )->first();
    
        if($data['image'] === "null"){
            unset($data['image']);
           $item->update($data);
       }else{
           $item->update($data);
           $item->image = custom_image($request);
       }
        $item->save();
        if($item){
            return response()->json([
                'item' => $item
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
        $item = Item::where('id' , $id)->delete();
        if($item){
            return response()->json([
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'message' => 'couldn\'t delete data'
        ]);
    }
}
