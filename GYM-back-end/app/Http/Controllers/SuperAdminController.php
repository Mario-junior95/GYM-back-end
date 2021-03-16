<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SuperAdmin;

use App\Http\Requests\AdminRequest;

use App\Http\Requests\SuperAdminLoginRequest;

use App\Http\Requests\ChangePasswordRequest;

class SuperAdminController extends Controller
{

    /**
     * Register a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AdminRequest  $request
     * @return \Illuminate\Http\AdminResponse
     */


  
    public function register(AdminRequest $request)
    {
        $superadmin = $request->all();
        SuperAdmin::create($superadmin);
        
        return response()->json('Successfully added');
       
    }

    /**
     * Login to an existing resource in storage.
     *
     * @return \Illuminate\Http\AdminLoginRequest
     */
    public function login(SuperAdminLoginRequest $request)
    {
        $credentials = request(['username', 'password']);

        if (! $token = auth('superadmin')->attempt($credentials)) {
            return response()->json(['error' => $this->respondWithToken($token)], 401);
        }else{
           return $this->respondWithToken($token);
        }
    }


    /**
     * Update Password for each Admin 
     *
     * @param  int  $id
     * @param  \Illuminate\Http\ChangePasswordRequest $request
     * @return \Illuminate\Http\Response
    */

    public function updatePassword(ChangePasswordRequest $request , $id){
        $data = $request->all();
        $superadminsUpdatePass = SuperAdmin::where('id' , $id)->first();
        $superadminsUpdatePass->password = $data['password'];
        $superadminsUpdatePass->update($data);
   
        return response()->json('Password successfully updated');
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
        $superadmin = auth('superadmin')->user();
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL()*60,
            'superAdmin' => $superadmin,
        ]);
    }
}
