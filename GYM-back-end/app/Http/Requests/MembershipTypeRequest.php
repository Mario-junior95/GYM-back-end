<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipTypeRequest extends FormRequest
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
            'benefits'  =>'required|max:825',
            'date' =>  'required',
            'amount' => 'required',
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
            'benefits.required'  => 'Benefits Field is required!',
            'benefits.max'  => 'Max length must be 825 words',
             
            'date.required' => 'Date Field is required!' ,
            
            'amount.required' => 'Amount Field is required!'
        ];
    }
}
