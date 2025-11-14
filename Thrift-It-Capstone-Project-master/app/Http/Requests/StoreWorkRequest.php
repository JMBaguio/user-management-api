<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreWorkRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Only allow logged-in upcyclers (role = 1)
        return Auth::check() && Auth::user()->role == 1;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'upcycle_type' => 'required|string|max:255',
            'approval_status' => "default"
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
