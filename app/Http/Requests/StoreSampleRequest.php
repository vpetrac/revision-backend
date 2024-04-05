<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSampleRequest extends FormRequest
{
    public function authorize(): bool
    {
        // TODO: Add your authorization logic here
        return true;
    }

    public function rules(): array
    {
        return [
            'sample_name' => 'nullable|string',
            'population_size' => 'nullable|string',
            'sampling_method' => 'nullable|string',
            'sample_size' => 'nullable|string',
            'collection_method' => 'nullable|string',
            'method_explanation' => 'nullable|string',
            'revision_id' => 'required|exists:revisions,id', // Make sure the revision exists
            // Add any other fields you need to validate
        ];
    }
}
