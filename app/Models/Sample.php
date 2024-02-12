<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sample extends Model
{
    use HasFactory;

    protected $fillable = [
        'sample_name',
        'population_size',
        'sampling_method',
        'sample_size',
        'collection_method',
        'method_explanation',
        'revision_id'
    ];

    /**
     * Get the revision that the sample belongs to.
     */
    public function revision(): BelongsTo
    {
        return $this->belongsTo(Revision::class);
    }
}
