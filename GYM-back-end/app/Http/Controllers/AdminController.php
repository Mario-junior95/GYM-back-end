<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AdminRequest;

use App\Http\Requests\UpdateAdminRequest;

use App\Admin;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::all();
        if($admin){
            return response()->json([
                'admin' => $admin
            ],200);
        }
        return response()->json([
            'message' => 'couldn\'t fetch data'
        ],401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AdminRequest   $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest  $request)
    {
        $data =  $request->all();
        $admin = new Admin;
        $admin->fill($data);
        $admin->save();
        if($admin){
            return response()->json([
                'admin' => $admin
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
        $admin = Admin::where('id', $id )->first();
        if($admin){
            return response()->json([
                'admin' => $admin
            ],200);
        }
        return response()->json([
            'message' => 'couldn\'t fetch data'
        ],401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateAdminRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, $id)
    {
        $data = $request->all();
        $admin = Admin::where('id', $id )->first();
        $admin->update($data);
        $admin->save();
        if($admin){
            return response()->json([
                'admin' => $admin
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
        $admin = Admin::where('id' , $id)->delete();
        if($admin){
            return response()->json([
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'message' => 'couldn\'t delete data'
        ]);
    }
}
