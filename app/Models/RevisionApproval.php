<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevisionApproval extends Model
{
    use HasFactory;

    protected $fillable = [
        'revision_planning_date',
        'revision_completion_date',
        'risk_assessment_date',
        'testing_program_completion_date',
        'testing_results_completion_date',
        'sample_selection_date',
        'draft_report_date',
        'final_report_date',
        'checklist_date',

        'revision_planning_concluded',
        'revision_completion_concluded',
        'risk_assessment_concluded',
        'testing_program_completion_concluded',
        'testing_results_completion_concluded',
        'sample_selection_concluded',
        'draft_report_concluded',
        'final_report_concluded',
        'checklist_concluded',

        'revision_id',
    ];

    public function revision()
    {
        return $this->belongsTo(Revision::class);
    }
}
