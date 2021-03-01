<?php

namespace App\Http\Controllers;

use App\Admin;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{

    /**
     * Register a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AdminRequest  $request
     * @return \Illuminate\Http\AdminResponse
     */


  
    public function register(Request $request)
    {
        $admin = $request->all();
        Admin::create($admin);
        
        return response()->json('Successfully added');
       
    }

    /**
     * Login to an existing resource in storage.
     *
     * @return \Illuminate\Http\AdminLoginRequest
     */
    public function login(Request $request)
    {
        $credentials = request(['username', 'password']);

        if (! $token = auth('admin')->attempt($credentials)) {
            return response()->json(['error' => $this->respondWithToken($token)], 401);
        }else{
           return $this->respondWithToken($token);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Admin Successfully logged out']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function respondWithToken($token)
    {
        $admin = auth('admin')->user();
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL()*60,
            'admin' => $admin,
        ]);
    }
}
