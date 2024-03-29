<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
            'email' => 'required|email|exists:user|bail',
            'password' => 'required|bail',
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
            'email.required' => 'Email is required!',
            'email.email' => 'Email must be of type email!',
            'email.exists' => 'Invalid Username or password',
            'password.required' => 'Password is required!',
        ];
    }
}
