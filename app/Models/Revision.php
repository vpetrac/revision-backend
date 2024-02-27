<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Revision extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'planned_start_of_internal_revision',
        'actual_start_of_internal_revision',
        'planned_draft_of_revision_report',
        'actual_draft_of_revision_report',
        'planned_final_revision_report',
        'actual_final_revision_report',
        'revision_goals_descrption',
        'revision_scope',
        'report_users',
        'control_system',
        'revision_plans',
        'deviation_reasons',

        'subjects',
        'supervisor',
        'auditTeamHead',
        'auditTeamMembers'
    ];

    public function organization(): HasOne
    {
        return $this->hasOne(Organization::class);
    }

    public function revisedSubjects(): BelongsToMany
    {
        return $this->belongsToMany(OrganizationalUnit::class);
    }

    public function supervisor(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function auditTeamHead(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function auditTeamMembers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function goals(): HasMany
    {
        return $this->hasMany(Goal::class);
    }

    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }

    public function samples(): HasMany
    {
        return $this->hasMany(Sample::class);
    }

    public function organizationUnits(): HasMany
    {
        return $this->hasMany(OrganizationalUnit::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    public function findings()
    {
        return $this->hasMany(Finding::class);
    }
}
