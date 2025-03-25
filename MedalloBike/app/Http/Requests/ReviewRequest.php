<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'route_id' => 'nullable|required_without:product_id|exists:routes,id',
            'product_id' => 'nullable|required_without:route_id|exists:products,id',
            'review' => 'required|string|max:255',
            'qualification' => 'required|integer|min:0|max:5',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
}
