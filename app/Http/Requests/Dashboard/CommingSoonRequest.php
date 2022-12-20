<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CommingSoonRequest extends FormRequest
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
            'title'          => 'required|min:5',
            'desc'           => 'required',
            'image'          => 'mimes:jpeg,jpg,png|required'
        ];
    }
    public function messages()
    {
        return [
            'image.mimes'       =>'jpeg or jpg or png'
        ];
    }
}
