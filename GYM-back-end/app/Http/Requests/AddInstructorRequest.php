<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddInstructorRequest extends FormRequest
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
            'name' => 'required|max:50|bail',
            'email' => 'required|email|unique:instructor|bail',
            'phone'  => 'required|numeric|unique:instructor|bail',
            'image' => 'required' ,
            'address' => 'required',
            'description' => 'required|max:623'
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

            'name.required' => 'FullName is required!',
            'name.max' => 'Max length 50 characters',

            'phone.required' => 'Phone is required!',
            'phone.numeric' => 'Phone must be a number!',
            'phone.unique' => 'hone number must be unique!',

            'email.required' => 'Email is required!',
            'email.email' => 'Email must be of type email!',
            'email.unique' => 'Email must be unique!',
             
            'image.required' => 'Image is required!' ,

            'address.required' => 'Address is required!',

            'description.required' => 'Description is required!',
            'description.max' => 'Description Field support only 623 words'
        ];
    }
}
