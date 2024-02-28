<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finding extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Assuming 'Nalaz' translates to 'name' or 'finding'
        'recommendations', // Assuming 'Preporuke' translates to 'recommendations'
        'importance', // 'Važnost'
        'status', // 'Status'
        'activities', // 'Aktivnosti'
        'responsibility', // 'Odgovornost' assumed to be 'responsibility'
        'deadline', // 'Rok' translates to 'deadline'
        'real_deadline', // 'Rok' translates to 'deadline'
        'finished_date', // 'Rok' translates to 'deadline'
        'finished_date_confirmed', // 'Rok' translates to 'deadline'
        'revision_id', // Foreign key to connect with 'Revision'
    ];

    /**
     * Get the revision that the finding belongs to.
     */
    public function revision()
    {
        return $this->belongsTo(Revision::class);
    }

    public function implementationActivities()
    {
        return $this->hasMany(ImplementationActivity::class);
    }
}
