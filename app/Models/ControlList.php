<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlList extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'revision_id'];
    
    protected $casts = [
        'content' => 'array', // Ensures the JSON is cast to an array when accessed
    ];

    public function revision()
    {
        return $this->belongsTo(Revision::class);
    }
}
