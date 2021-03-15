<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'name'  =>'required',
            'amount' =>  'required',
            'type' => 'required',
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
            'name.required'  => 'Item Name Field is required!',
            'amount.required' => 'Amount Field is required!' ,
            'type.required' => 'Type Field is required!',
            'image.required' => 'Image Field is required!'
        ];
    }
}
