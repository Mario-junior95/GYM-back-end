<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'firstname' => 'required|max:50|bail',
            'lastname'  => 'required|max:50|bail',
            'phone' => 'required|numeric|unique:user|bail',
            'email' => 'required|email|unique:user|bail',
            'password' => 'required|min:6|bail',
            'address' => 'required',
            'date' => 'required|date',
            'gender' => 'required',
            // 'membership_id'=> 'required'
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

            'firstname.required' => 'FirstName is required!',
            'fistname.max' => 'Max length 50 characters',

            'lastname.required' => 'LastName is required!',
            'lastname.max' => 'Max length 50 characters',

            'phone.required' => 'Phone is required!',
            'phone.numeric' => 'Phone must be a number!',
            'phone.unique' => 'Phone number must be unique!',

            'email.required' => 'Email is required!',
            'email.email' => 'Email must be of type email!',
            'email.unique' => 'Email must be unique!',

            'password.required' => 'Password is required!',
            'password.min' => 'Password must contain at least 6 character!',
             
            'address.required' => 'Address is required!',

            'date.required' => 'Date is required!',

            'gender' => 'Gender is required!'

        ];
    }
}
