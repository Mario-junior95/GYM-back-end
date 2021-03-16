<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkWithUsRequest extends FormRequest
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
            'email' => 'required|email',
            'image' => 'required' , 
            'description' => 'required|max:623',
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
                         
            'image.required' => 'Image is required!' ,

            'description.required' => 'Message Field is required!',
            'description.max' => 'Message Field support only 623 words',

        ];
    }
}
