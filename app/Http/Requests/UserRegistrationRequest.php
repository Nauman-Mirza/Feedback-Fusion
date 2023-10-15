<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'age' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'number' => 'required|max:11',
            'address' => 'required|max:150',
            'country' => 'required'
        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already in use.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters long.',
            'age.required' => 'The age field is required.',
            'gender.required' => 'The gender field is required.',
            'dob.required' => 'The date of birth field is required.',
            'number.required' => 'The phone number field is required.',
            'number.max' => 'The phone number must not exceed 11 characters.',
            'address.required' => 'The address field is required.',
            'address.max' => 'The address must not exceed 150 characters.',
            'country.required' => 'The country field is required.',
        ];
    }
}
