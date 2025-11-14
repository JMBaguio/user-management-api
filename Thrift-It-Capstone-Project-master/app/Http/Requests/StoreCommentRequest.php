<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\ContentModerationService;

class StoreCommentRequest extends FormRequest
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
            'content'     => 'required|string|max:1000',
            'parent_id'   => 'nullable|exists:comments,id',
            'product_id'  => 'nullable|exists:products,id',
            'donation_id' => 'nullable|exists:donations,id',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!$this->product_id && !$this->donation_id) {
                $validator->errors()->add('product_or_donation', 'A comment must be linked to a product or a donation.');
            }
            
            // Content moderation check
            $contentModeration = new ContentModerationService();
            $validation = $contentModeration->validateContent($this->content);
            
            if (!$validation['is_valid']) {
                $validator->errors()->add('content', $validation['message']);
            }
        });
    }


    //ERROR MESSAGE
    public function messages()
    {
        return [
            'content.required' => 'The comment field cannot be empty.',
            'content.string' => 'The comment must be a valid text.',
            'content.max' => 'The comment cannot exceed 500 characters.',
        ];
    }
}