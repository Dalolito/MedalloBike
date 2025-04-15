<?php

namespace App\Http\Requests;

// Made by: David Lopera Londoño

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'totalPrice' => 'required|numeric|min:0',
            'user_id' => 'required|integer|exists:users,id',
            'state' => 'required|string|in:pending,processing,completed,cancelled',
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
            'totalPrice.required' => 'The total price field is required.',
            'totalPrice.numeric' => 'The total price must be a number.',
            'totalPrice.min' => 'The total price must be at least 0.',
            'user_id.required' => 'The user ID field is required.',
            'user_id.integer' => 'The user ID must be an integer.',
            'user_id.exists' => 'The selected user does not exist.',
            'state.required' => 'The state field is required.',
            'state.string' => 'The state must be a string.',
            'state.in' => 'The state must be either "pending", "processing", "completed", or "cancelled".',
        ];
    }
}
