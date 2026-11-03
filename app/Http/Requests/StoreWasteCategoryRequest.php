<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreWasteCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'code' => strtoupper(trim((string) $this->input('code'))),
        ]);
    }

    public function rules(): array
    {
        return [
            'code' => [
                'required',
                'string',
                'max:50',
                'regex:/^[A-Z0-9_-]+$/',
                'unique:waste_categories,code',
            ],
            'name' => ['required', 'string', 'max:255'],
            'hazard_class' => ['required', 'string', 'max:100'],
            'fee_per_kg' => ['required', 'numeric', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Waste code is required.',
            'code.regex' => 'Waste code may contain only letters, numbers, underscores, and hyphens.',
            'code.unique' => 'This waste code already exists.',
            'name.required' => 'Waste category name is required.',
            'hazard_class.required' => 'Hazard class is required.',
            'fee_per_kg.required' => 'Fee per kilogram is required.',
            'fee_per_kg.min' => 'Fee per kilogram cannot be negative.',
        ];
    }
}