<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', // 'recommendations'
        'importance', // Importance level
        'status', // Current status
        'activities', // Associated activities
        'responsibility', // Assigned responsibility
        'partner', // Assigned responsibility
        'deadline', // Expected deadlines as an array
        'real_deadline', // Actual deadline date
        'finished_date', // Date when finished
        'finished_date_confirmed', // Date when finish was confirmed
        'finished_date_concluded', // Boolean if finished was concluded
        'finished_date_confirmed_concluded', // Boolean if finish confirmation was concluded
        'finding_id', // Foreign key to connect with 'Revision'
        'revision_id', // Foreign key to connect with 'Revision'
    ];

    protected $casts = [
        'deadline' => 'array',
    ];

    /**
     * Get the revision that the finding belongs to.
     */
    public function revision()
    {
        return $this->belongsTo(Revision::class);
    }

    public function finding()
    {
        return $this->belongsTo(Finding::class);
    }

    public function implementationActivities()
    {
        return $this->hasMany(ImplementationActivity::class);
    }
}
