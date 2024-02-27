<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'revision_id'];

    public function revision()
    {
        return $this->belongsTo(Revision::class);
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'goal_program');
    }
}
