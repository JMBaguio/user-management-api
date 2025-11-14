<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreAppointmentRequest extends FormRequest
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
            
            'upcycler_id' => 'required|exists:users,id',
            'appdetails' => 'required|string|min:15|max:255',
            'contactnumber' => 'required|numeric|digits_between:10,15',
            'apptype' => ['required', 'in:Resize,Customize,Patchwork,Fabric Dyeing'],
            'appstatus' => ['nullable', 'in:pending,approved,declined,completed,cancelled'],
            'appdate' => 'required|date|after:now',

            // Multi-image input from the form: images[]
            'images'   => 'required|array|min:2|max:8',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ];
    }
}
