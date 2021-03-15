<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
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
            'title'  =>'required',
            'description' =>  'required|max:623',
            'image' => 'required'
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
            'title.required'  => 'Title Field is required!',
            'description.required' => 'Description Field is required!' ,
            'description.max' => 'Description Field support only 623 words',
            'image.required' => 'Image Field is required!'
        ];
    }
}
