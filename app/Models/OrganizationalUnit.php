<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrganizationalUnit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function head(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function organization(): HasOne
    {
        return $this->hasOne(Organization::class);
    }

    public function revision(): BelongsTo
    {
        return $this->belongsTo(Revision::class);
    }
}
