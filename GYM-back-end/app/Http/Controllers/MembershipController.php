<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Membership;

class MembershipController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $membership = Membership::with('user')->get();
        if($membership){
            return response()->json([
                'membership' => $membership
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
        $membership  = new Membership ;
        $membership ->fill($data);
        $membership ->save();
        if($membership ){
            return response()->json([
                'membership ' => $membership 
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $membership  = Membership ::where('id', $id )->first();
        $membership ->update($data);
        $membership ->save();
        if($membership ){
            return response()->json([
                'membership ' => $membership 
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
        $membership = Membership::where('id' , $id)->delete();
        if($membership){
            return response()->json([
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'message' => 'couldn\'t delete data'
        ]);
    }
}
