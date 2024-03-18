<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrganizationalUnit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'heads', 'organization_id'];

    public function head(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function revisions(): HasMany
    {
        return $this->hasMany(Revision::class);
    }
}
