<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\LoginUserRequest;



class AuthController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AddUserRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function register(AddUserRequest $request)
    {
         $user = $request->all();
         User::create($user);
        //  return response()->json('Successfully added');

         if (! $token = auth()->attempt($user)) {
             return response()->json(['error' => 'Unauthorized'], 401);
         }
 
         return $this->respondWithToken($token);
    }


    /**
     * Login to an existing resource in storage.
     *
     * @return \Illuminate\Http\LoginUserRequest 
     */

    public function login(LoginUserRequest $request)
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        $user = auth()->user();
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
            'user' => $user
        ]);
    }
}
