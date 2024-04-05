<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProgramRequest extends FormRequest
{
    public function authorize(): bool
    {
        // TODO: Add your authorization logic here
        return true;
    }

    public function rules(): array
    {
        return [
            'possible_risk_causes' => 'sometimes|nullable|string',
            'possible_risk_consequences' => 'sometimes|nullable|string',
            'expected_controls' => 'sometimes|nullable|string',
            'existing_controls' => 'sometimes|nullable|string',
            'test_purpose' => 'sometimes|nullable|string',
            'testing_method' => 'sometimes|nullable|string',
            'testing_questions' => 'sometimes|nullable|string',
            'testing_results' => 'sometimes|nullable|string',
            'conclusions_for_drafting_report' => 'sometimes|nullable|string',
            'references_to_working_documents' => 'sometimes|nullable|string',
            'effect_value' => 'required|integer',
            'probability_value' => 'required|integer',
            'risk_description' => 'sometimes|nullable|string',
            'revision_id' => 'sometimes|required|exists:revisions,id',
            // Add any other fields that can be updated
        ];
    }
}
