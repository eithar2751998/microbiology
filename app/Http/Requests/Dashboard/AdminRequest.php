<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name'               => 'required',
            'email'              => 'required|email|unique:admins',
            'password'           => 'required|confirmed|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/',
            'roles'              => 'required'
        ];
    }
    public function messages()
    {
        return [
            'password.regex' => 'more than 8 characters long, at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.'
        ];
    }
}
