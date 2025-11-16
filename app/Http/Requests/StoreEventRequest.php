<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:60',
            'description' => 'nullable|string|max:1000',
            'location' => 'nullable|string|max:20',
            'date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Event name is required',
            'name.max' => 'Event name must not exceed 60 characters',
            'description.max' => 'Description must not exceed 1000 characters',
            'location.max' => 'Location must not exceed 20 characters',
            'date.required' => 'Event date is required',
            'date.date' => 'Event date must be a valid date',
        ];
    }
}
