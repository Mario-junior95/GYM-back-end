<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'firstname' => 'required|bail|min:3|max:55|regex:/[a-z]/',
            'lastname'  =>'required|min:3|max:55|regex:/[a-z]/',
            'email' =>  'required|bail|email',
            'phone' => 'required|numeric|bail',
            'address' => 'required',
            'date' => 'required|date',
            'gender' => 'required',
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
        
            'phone.required' => 'Phone is required!',
            'phone.numeric' => 'Phone must be a number!',

            'address.required' => 'Address is required!',

            'date.required' => 'Date is required!',

            'gender' => 'Gender is required!'
        ];
    }
}
