<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * ContactFormRequest handles validation for the contact form submission
 * 
 * This request class validates all contact form fields and provides
 * custom error messages for better user experience.
 */
class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow all users to submit contact form
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'min:2'
            ],
            'email' => [
                'required',
                'email',
                'max:255'
            ],
            'subject' => [
                'nullable',
                'string',
                'max:255'
            ],
            'message' => [
                'required',
                'string',
                'max:2000',
                'min:10'
            ]
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your full name.',
            'name.min' => 'Your name must be at least 2 characters long.',
            'name.max' => 'Your name cannot exceed 255 characters.',
            
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Your email address cannot exceed 255 characters.',
            
            'subject.max' => 'The subject cannot exceed 255 characters.',
            
            'message.required' => 'Please enter your message.',
            'message.min' => 'Your message must be at least 10 characters long.',
            'message.max' => 'Your message cannot exceed 2000 characters.'
        ];
    }

    /**
     * Get custom attribute names for error messages.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'full name',
            'email' => 'email address',
            'subject' => 'subject',
            'message' => 'message'
        ];
    }
}
