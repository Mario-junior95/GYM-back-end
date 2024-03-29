<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::resource('/admin' , 'AdminController');
    Route::match(['post' , 'put'] , '/updatePassword/{id}' , 'AdminAuthController@updatePassword');
    Route::match(['post' , 'put'] , '/updatePassword/{id}' , 'SuperAdminController@updatePassword');
    Route::get('/user/{id}' , 'UserController@show');
    Route::get('/admin/{id}' , 'AdminController@show');
});

//Ma t7ota bel middleware:::
Route::resource('/user' , 'UserController');


Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

/**   New  */
Route::resource('/membership' , 'MembershipController');
Route::get('/membership/{id}' , 'MembershipController@show');
Route::resource('/payement' , 'PayementController');
Route::resource('/workout' , 'WorkoutController');
Route::get('/workout/{id}' , 'WorkoutController@show');
Route::resource('/instructor' , 'InstructorController');
Route::get('/instructor/{id}' , 'InstructorController@show');
Route::resource('/workoutplan' , 'WorkOutPlanController');


/**Admin section */
Route::post('/admin-login', 'AdminAuthController@login');
Route::get('/admin-login' , 'AdminAuthController@login' );
Route::post('/admin-register', 'AdminAuthController@register');
Route::post('/logout', 'UserController@logout');

/** Super Admin Section */
Route::post('/superadmin-login', 'SuperAdminController@login');
Route::get('/superadmin-login' , 'SuperAdminController@login' );
Route::post('/superadmin-register', 'SuperAdminController@register');

/**  Instructor Auth Controller */
Route::post('/instructor-login', 'InstructorAuthController@login');
Route::get('/instructor-login' , 'InstructorAuthController@login' );
Route::post('/instructor-register', 'InstructorAuthController@register');



/**   Newwww */

Route::resource('/time' , 'TimeController');
Route::resource('/userIntsructorTime' , 'UserInstructorTimeController');


Route::resource('/shop' , 'ShopController');
// Route::resource('/type' , 'TypeController');


Route::resource('/home' , 'HomeController');
Route::resource('/faq' , 'FaqController');
Route::resource('/contactus' , 'ContactUsController');

Route::resource('/item' , 'ItemController');

Route::resource('/workwithus' , 'WorkWithUsController');




