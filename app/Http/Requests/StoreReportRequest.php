<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // You may want to update this based on your auth logic
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
            'theme' => 'nullable|string',
            'datetime' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'attendees' => 'nullable|string',
            'absentees' => 'nullable|string',
            'minutes_taken_by' => 'nullable|string|max:255',
            'compiled_by' => 'nullable|string|max:255',
            'approved_by' => 'nullable|string|max:255',
            'tasks' => 'nullable|array',
            'content' => 'nullable|string',
            'revision_id' => 'required|exists:revisions,id',
        ];
    }
}

