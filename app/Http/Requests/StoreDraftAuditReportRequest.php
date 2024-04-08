<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDraftAuditReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'draft_date' => 'nullable|date',
            'management_summary' => 'nullable|string',
            'audit_opinion' => 'nullable|string',
            'positive_findings' => 'nullable|string',
            'management_comments' => 'nullable|string',
            'findings_and_recommendations_summary' => 'nullable|string',
            'basis_for_implementation_and_audit_period' => 'nullable|string',
            'summary_of_significant_findings_and_recommendations' => 'nullable|string',
            'revision_id' => 'required|integer|exists:revisions,id',
        ];
    }
}