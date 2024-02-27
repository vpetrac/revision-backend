<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRevisionRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Only allow authenticated users to make this request
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:100|unique:revisions,code',
            'planned_start_of_internal_revision' => 'nullable|date',
            'actual_start_of_internal_revision' => 'nullable|date',
            'planned_draft_of_revision_report' => 'nullable|date',
            'actual_draft_of_revision_report' => 'nullable|date',
            'planned_final_revision_report' => 'nullable|date',
            'actual_final_revision_report' => 'nullable|date',
            'revision_goals_descrption' => 'nullable|string|max:65535',
            'revision_goals' => 'nullable|array',
            'revision_scope' => 'nullable|string|max:65535',
            'report_users' => 'nullable|string|max:65535',
            'control_system' => 'nullable|string|max:65535',
            'revision_plans' => 'nullable|json',
            'deviation_reasons' => 'nullable|string|max:65535',

            'subjects' => 'nullable|json',
            'supervisor' => 'nullable|string|max:65535',
            'auditTeamHead' => 'nullable|string|max:65535',
            'auditTeamMembers' => 'nullable|json',
            // Add rules for any other fields you have
        ];
    }
}

