<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class StoreDonationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id', 
            'name' => 'required|string|max:255',
            'description' => 'required|min:15|string',
            'approval_status' => 'in:approved,pending,rejected',
            'size' => 'required|string',
            'status' => 'in:available,unavailable|default:available',
            'barangay_id' => 'required|exists:barangays,id',
             // Multi-image input from the form: images[]
            'images'   => 'required|array|min:2|max:8',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ];
    }

    
    public function messages(): array
    {
        return [
            'images.required' => 'You must upload at least 2 images.',
            'images.array' => 'Images must be uploaded as an array.',
            'images.min' => 'You must upload at least 2 images.',
            'images.*.image' => 'Each file must be an image.',
            'images.*.mimes' => 'Images must be JPG or PNG.',
            'images.*.max' => 'Each image cannot exceed 5MB.',
        ];
    }
}
