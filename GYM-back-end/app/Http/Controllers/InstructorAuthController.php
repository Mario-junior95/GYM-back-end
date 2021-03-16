<?php

namespace App\Http\Controllers;

use App\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\AdminRequest;

use App\Http\Requests\AdminLoginRequest;

use App\Http\Requests\ChangePasswordRequest;

use App\Instructor;

use App\Helpers\Helpers;

class InstructorAuthController extends Controller
{

    /**
     * Register a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AdminRequest  $request
     * @return \Illuminate\Http\AdminResponse
     */


  
    public function register(Request $request)
    {
        $instructor = $request->all();
        Instructor::create($instructor);   
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

        if (! $token = auth('instructor')->attempt($credentials)) {
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
        $instructorUpdatePass = Instructor::where('id' , $id)->first();
        $instructorUpdatePass->password = $data['password'];
        $instructorUpdatePass->update($data);
   
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
        $instructor = auth('instructor')->user();
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL()*60,
            'instructor' => $instructor,
        ]);
    }
}
