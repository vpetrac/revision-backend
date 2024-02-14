<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSampleRequest extends FormRequest
{
    public function authorize(): bool
    {
        // TODO: Add your authorization logic here
        return true;
    }

    public function rules(): array
    {
        return [
            'sample_name' => 'sometimes|nullable|string|max:255',
            'population_size' => 'sometimes|nullable|string',
            'sampling_method' => 'sometimes|nullable|string|max:255',
            'sample_size' => 'sometimes|nullable|string',
            'collection_method' => 'sometimes|nullable|string|max:255',
            'method_explanation' => 'sometimes|nullable|string',
            'revision_id' => 'sometimes|required|exists:revisions,id',
            // Add any other fields that can be updated
        ];
    }
}
