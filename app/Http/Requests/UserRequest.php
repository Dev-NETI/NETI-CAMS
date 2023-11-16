<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255' , 
            'email' => 'required|email|max:255|unique:users' , 
            'department_id' => 'required' , 
            'usertype_id' => 'required' , 
            'password' => [
                'required',
                'string',
                'min:8',              // Minimum length of 8 characters
                'regex:/^(?=.*[A-Z])/',  // At least one uppercase letter
                'regex:/^(?=.*[a-z])/',  // At least one lowercase letter
                'regex:/^(?=.*\d)/',     // At least one numeric digit
                'regex:/^(?=.*[@$!%*#?&])/', // At least one special character
            ]
        ];
    }
}
