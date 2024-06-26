<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImplementationActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id', // Foreign key to the users table
        'recommendation_id', // Foreign key to the findings table
    ];

    /**
     * Get the user that created the activity.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the finding that the activity is associated with.
     */
    public function recommendation()
    {
        return $this->belongsTo(Recommendation::class);
    }
}
