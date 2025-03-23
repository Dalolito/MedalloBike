<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'quantity' => 'required|integer|min:1',
            'totalPrice' => 'required|numeric|min:0',
            'product_id' => 'required|integer|exists:products,id',
            'order_id' => 'nullable|integer|exists:orders,id',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'quantity.required' => 'The quantity field is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least 1.',
            'totalPrice.required' => 'The total price field is required.',
            'totalPrice.numeric' => 'The total price must be a number.',
            'totalPrice.min' => 'The total price must be at least 0.',
            'product_id.required' => 'The product ID field is required.',
            'product_id.integer' => 'The product ID must be an integer.',
            'product_id.exists' => 'The selected product does not exist.',
            'order_id.integer' => 'The order ID must be an integer.',
            'order_id.exists' => 'The selected order does not exist.',
        ];
    }
}