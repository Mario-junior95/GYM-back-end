<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
            'firstname' => 'required|bail|min:3|max:55|regex:/[a-z]/',
            'lastname'  =>'required|min:3|max:55|regex:/[a-z]/',
            'email' =>  'required|bail|email|unique:admins',
            'username' => 'required|string|bail|min:6|regex:/[a-z]/|unique:admins',
            'password' => 'required|string|bail|min:6|regex:/[@$!%*#?&]/',
        ];
    }

    /**
      * Get the error messages for the defined validation rules.
      *
      * @return array
    */


    public function messages()
    {
        return [
            'firstname.min'  => 'Firstname minimum length 3',
            'firstname.max'  => 'Firstname maximum lenth 55',
            'firstname.regex' => 'Firstname accept only lowercase letter or uppercase letter',
           
            'lastname.min'  => 'Lastname minimum length 3',
            'lastname.max'  => 'Lastname maximum lenth 55',
            'lastname.regex' => 'lastname accept only lowercase letter or uppercase letter',
            
            'email.unique' => 'Email already Exist.',
            'email.required' => 'Email is required!',
            'email.email' => 'Email must be of type email!',
            'email.unique' => 'Email Already Exist!',
            
            'username.required' => 'Username is required!',
            'username.min'  => 'Username minimun length 6',
            'username.regex' => 'Username must contain at least one lowercase letter',
            'username.unique' => 'Username already exist!',
            
            'password.required' => 'Password is required!',
            'password.min' => 'Password must contain at least 6 character!',
            'password.regex' => 'Password must contain a special character',
            
        ];
    }


}
