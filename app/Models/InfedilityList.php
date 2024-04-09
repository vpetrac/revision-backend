<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfedilityList extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['content', 'user_id', 'revision_id'];

    protected $casts = [
        'content' => 'array', // Ensures the JSON is cast to an array when accessed
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function revision()
    {
        return $this->belongsTo(Revision::class);
    }
}
