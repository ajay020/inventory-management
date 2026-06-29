<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSupplierRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'name' => [
                'required',
                 'string', 
                 'max:255', 
                 Rule::unique('suppliers')->ignore($this->supplier),
            ],

            'contact_person' => ['nullable', 'string', 'max:255'],

            'email' => ['nullable', 'email'],

            'phone' => ['nullable', 'string', 'max:20'],

            'address' => ['nullable', 'string'],

            'is_active' => ['required', 'boolean'],
        ];
    }
}
