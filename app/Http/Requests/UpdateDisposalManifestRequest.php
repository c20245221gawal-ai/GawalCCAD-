<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDisposalManifestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'generator_id' => [
                'required',
                'integer',
                'exists:generators,id',
            ],
            'waste_category_id' => [
                'required',
                'integer',
                'exists:waste_categories,id',
            ],
            'transporter_id' => [
                'required',
                'integer',
                'exists:transporters,id',
            ],
            'disposal_facility_id' => [
                'required',
                'integer',
                'exists:disposal_facilities,id',
            ],
            'container_type' => [
                'required',
                'string',
                'max:100',
            ],
            'weight_kg' => [
                'required',
                'numeric',
                'gt:0',
            ],
            'pickup_date' => [
                'required',
                'date',
            ],
            'compliance_status' => [
                'sometimes',
                Rule::in(['pending', 'compliant', 'non_compliant']),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'generator_id.required' => 'Please select a generator.',
            'generator_id.exists' => 'The selected generator does not exist.',
            'waste_category_id.required' => 'Please select a waste category.',
            'waste_category_id.exists' => 'The selected waste category does not exist.',
            'transporter_id.required' => 'Please select a transporter.',
            'transporter_id.exists' => 'The selected transporter does not exist.',
            'disposal_facility_id.required' => 'Please select a disposal facility.',
            'disposal_facility_id.exists' => 'The selected disposal facility does not exist.',
            'container_type.required' => 'Container type is required.',
            'weight_kg.required' => 'Waste weight is required.',
            'weight_kg.gt' => 'Waste weight must be greater than zero.',
            'pickup_date.required' => 'Pickup date is required.',
            'compliance_status.in' => 'The selected compliance status is invalid.',
        ];
    }
}