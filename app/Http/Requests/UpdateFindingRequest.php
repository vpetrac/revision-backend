<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFindingRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255',
            'recommendations' => 'nullable|string',
            'importance' => 'nullable|integer|min:1|max:5', // Assuming importance is a scale from 1 to 5
            'status' => 'sometimes|required|string|max:255',
            'activities' => 'nullable|string',
            'responsibility' => 'sometimes|required|string|max:255',
            'deadline' => 'nullable|date',
            'revision_id' => 'sometimes|required|exists:revisions,id', // Make sure revision exists if provided
        ];
    }
}
