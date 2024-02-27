<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'possible_risk_causes',
        'possible_risk_consequences',
        'expected_controls',
        'existing_controls',
        'test_purpose',
        'testing_method',
        'testing_questions',
        'testing_results',
        'conclusions_for_drafting_report',
        'references_to_working_documents',
        'effect_value',
        'probability_value',
        'risk_description',
        'revision_id'
    ];

    public function revision(): BelongsTo
    {
        return $this->belongsTo(Revision::class);
    }

    public function goals()
    {
        return $this->belongsToMany(Goal::class, 'goal_program');
    }
}
