<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
   public function rules(): array {
        return [
            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'sku' => [
                'required',
                'string',
                'max:100',
                'unique:products,sku',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'cost_price' => [
                'required',
                'numeric',
                'min:0',
            ],

           'selling_price' => [
                'required',
                'numeric',
                'min:0',
                'gte:cost_price',
            ],

            'stock_quantity' => [
                'required',
                'integer',
                'min:0',
            ],

            'minimum_stock_level' => [
                'required',
                'integer',
                'min:0',
            ],

            'is_active' => [
                'required',
                'boolean',
            ],
        ];
    }

    
    public function messages(): array {
        return [
            'selling_price.gte' =>
                'Selling price must be greater than or equal to the cost price.',
        ];
    }
}
