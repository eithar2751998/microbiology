<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'         => 'required|min:5',
            'image'         => 'mimes:jpeg,jpg,png',
            'text'          => 'required',
            'subjects'      => 'required',
            'correct'       => 'required'
        ];
    }
    public function messages()
    {
        return [
            'image.mimes'       =>'jpeg or jpg or png'
        ];
    }
}
