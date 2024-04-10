<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftAuditReport extends Model
{
    use HasFactory;

    protected $table = 'draft_audit_reports';

    protected $fillable = [
        'draft_date', // Datum nacrta
        'management_summary', // UPRAVLJAČKI SAŽETAK
        'audit_opinion', // REVIZORSKO MIŠLJENJE
        'basis_for_implementation_and_audit_period', // Temelj za provedbu i razdoblje provedbe revizije
        'summary_of_significant_findings_and_recommendations', // SAŽETAK NAJZNAČAJNIJIH NALAZA I PREPORUKA
        'conclusion',
        'revision_id'
    ];

    protected $casts = [
        'draft_date' => 'date',
    ];

    public function revision()
    {
        return $this->belongsTo(Revision::class);
    }
}
