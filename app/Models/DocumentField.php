<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentField extends Model
{
    use HasFactory;

    protected $fillable = ['recommendationPlanSignature', 'revisionId'];

    public function revision()
    {
        return $this->belongsTo(Revision::class, 'revisionId');
    }
}
