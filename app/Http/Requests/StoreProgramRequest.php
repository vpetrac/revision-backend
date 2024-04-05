<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramRequest extends FormRequest
{
    public function authorize(): bool
    {
        // TODO: Add your authorization logic here
        return true;
    }

    public function rules(): array
    {
        return [
            'possible_risk_causes' => 'nullable|string',
            'possible_risk_consequences' => 'nullable|string',
            'expected_controls' => 'nullable|string',
            'existing_controls' => 'nullable|string',
            'test_purpose' => 'nullable|string',
            'testing_method' => 'nullable|string',
            'testing_questions' => 'nullable|string',
            'testing_results' => 'nullable|string',
            'conclusions_for_drafting_report' => 'nullable|string',
            'references_to_working_documents' => 'nullable|string',
            'effect_value' => 'nullable|integer',
            'probability_value' => 'nullable|integer',
            'risk_description' => 'required|nullable|string',
            'revision_id' => 'required|exists:revisions,id', // Make sure the revision exists
            // Add any other fields you need to validate
        ];
    }
}
