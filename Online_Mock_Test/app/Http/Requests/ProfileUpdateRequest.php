<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'profile_picture' => 'nullable|image|max:2048',
            'about' => 'nullable|string|max:500',
            'education' => 'nullable|string|max:255',
            'current_organization' => 'nullable|string|max:255',
            'current_position' => 'nullable|string|max:255',
            'skills' => 'nullable|string|max:500',
            'interests' => 'nullable|string|max:500',
            'experience' => 'nullable|string|max:500',
            'role' => 'nullable|string|max:50',
            'linkedin' => 'nullable|url|max:255',
        ];
    }
}
