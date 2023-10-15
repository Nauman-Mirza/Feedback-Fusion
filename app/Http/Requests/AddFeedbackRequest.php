<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFeedbackRequest extends FormRequest
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
            'title' => 'required|max:50',
            'description' => 'required|max:1000',
            'category' => 'required',
        ];
    }

    /**
     * Get custom error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The title is required.',
            'title.max' => 'The title may not be greater than 50 characters.',
            'description.required' => 'The description is required.',
            'description.max' => 'The description may not be greater than 1000 characters.',
            'category.required' => 'The category is required.',
        ];
    }
}
