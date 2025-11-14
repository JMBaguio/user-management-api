<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'description' => 'required|string|min:15',
            'price' => 'required|numeric|min:0',
            'approval_status' => 'in:approved,pending,rejected',
            'size' => 'required|string',

            // Multi-image input from the form: images[]
            'images'   => 'required|array|min:2|max:8',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp,gif|max:5120',

            'qty' => 'integer',
            'status' => 'required|in:available,sold',
            'segment_id' => 'required|exists:segments,id',
            'barangay_id'   => 'required|exists:barangays,id',
            'qr_code' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048']
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
