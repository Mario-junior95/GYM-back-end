<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            'question' => 'required|max:100',
            'answer' => 'required|max:623',
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
            'question.required' => 'Question is required!',
            'question.max' => 'Qusetion Field support only 100 words',
            'answer.required' => 'Answer is required!',
            'answer.max' => 'Answer Field support only 623 words',
        ];
    }
}
