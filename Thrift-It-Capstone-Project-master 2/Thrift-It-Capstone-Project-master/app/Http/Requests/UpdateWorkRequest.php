<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateWorkRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Only the owner (upcycler) or admin can update
        return Auth::check() && (Auth::user()->role == 1 || Auth::user()->role == 2);
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'in:available,unavailable',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    
    public function messages(): array
    {
        return [
            'title.required' => 'The work title is required.',
            'images.*.image' => 'Each uploaded file must be an image.',
        ];
    }
}
