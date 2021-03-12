<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInstructorTimeRequest extends FormRequest
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
            'time_id'=> 'unique:user_instructor_time',
            // 'instructor_id'=>'unique:instructor'
            
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
            'time_id.unique' => 'Already reserved!'
        ];
    }
}
