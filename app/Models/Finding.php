<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finding extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // 'name' or 'finding'
        'revision_id', // Foreign key to connect with 'Revision'
    ];

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
    /**
     * Get the revision that the finding belongs to.
     */
    public function revision()
    {
        return $this->belongsTo(Revision::class);
    }
}
