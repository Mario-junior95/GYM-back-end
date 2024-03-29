<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkoutRequest extends FormRequest
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
        return 
        [
            'description.required' => 'Description is required!',
            'description.max' => 'Description Field support only 623 words'
        ];
    }
}
