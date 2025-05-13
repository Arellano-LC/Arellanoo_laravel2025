<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    // Allow anyone who is authenticated to update their password
    public function authorize(): bool
    {
        return true;
    }

    // Define validation rules
    public function rules(): array
    {
        return [
            'old_password' => 'required|string',  // Ensure old password is provided
            'new_password' => 'required|string|min:8',  // New password should be at least 8 characters
            'confirm_password' => 'required|string|same:new_password',  // Ensure new password matches the confirmation
        ];
    }

    // Define custom error messages for the validation rules
    public function messages(): array
    {
        return [
            'confirm_password.same' => 'New passwords do not match.',  // Custom message for password mismatch
        ];
    }
}
