<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecommendationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content' => 'nullable|string',
            'importance' => 'nullable|integer|min:1|max:5', // Assuming importance is a scale from 1 to 5
            'status' => 'sometimes|required|string|max:255',
            'activities' => 'nullable|string',
            'responsible_users' => 'nullable|string',
            'responsibility' => 'nullable|json',
            'partner' => 'nullable|json',
            'deadline.*.date' => 'nullable|date',
            'real_deadline' => 'nullable|date',
            'finished_date' => 'nullable|date',
            'finished_date_concluded' => 'nullable|boolean',
            'finished_date_confirmed' => 'nullable|date',
            'finished_date_confirmed_concluded' => 'nullable|boolean',
            'revision_id' => 'sometimes|required|exists:revisions,id', // Make sure revision exists if provided
            'finding_id' => 'sometimes|required|exists:findings,id', // Make sure revision exists if provided
        ];
    }
}
