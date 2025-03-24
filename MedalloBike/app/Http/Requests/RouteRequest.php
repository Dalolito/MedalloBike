<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'difficulty' => 'required|integer|min:1|max:5',
            'type' => 'required|string|max:100',
            'zone' => 'required|string|max:100',
            'imageMap' => 'required|string|max:255',
            'coordinateStart' => 'required|array|size:2',
            'coordinateStart.*' => 'required|numeric',
            'coordinateEnd' => 'required|array|size:2',
            'coordinateEnd.*' => 'required|array|size:2',
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
            'name.required' => 'The name field is required.',
            'description.required' => 'The description field is required.',
            'difficulty.required' => 'The difficulty field is required.',
            'difficulty.min' => 'The difficulty must be at least 1.',
            'difficulty.max' => 'The difficulty may not be greater than 5.',
            'type.required' => 'The type field is required.',
            'zone.required' => 'The zone field is required.',
            'imageMap.required' => 'The imageMap field is required.',
            'coordinateStart.required' => 'The coordinateStart field is required.',
            'coordinateStart.size' => 'The coordinateStart must contain exactly 2 values.',
            'coordinateStart.*.numeric' => 'Each value in coordinateStart must be numeric.',
            'coordinateEnd.required' => 'The coordinateEnd field is required.',
            'coordinateEnd.size' => 'The coordinateEnd must contain exactly 2 values.',
            'coordinateEnd.*.numeric' => 'Each value in coordinateEnd must be numeric.',
        ];
    }
}
