<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'email' =>  'required|bail|email',
            'message' => 'required|max:1000',
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

            'message.required' => 'Message is required!',
            'message.max' => 'Message can Contain only 1000 Words'
        ];
    }
}
