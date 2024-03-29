<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password.required' => 'Password is required!',
            'password.min' => 'Password must contain at least 6 character!',
            'password.regex' => 'Password must contain a special character',
        ];
    }

}
