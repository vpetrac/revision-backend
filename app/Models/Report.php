<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme',
        'datetime', // datum i vrijeme
        'location', // Mjesto
        'attendees', // Prisutni
        'absentees', // Odsutni
        'minutes_taken_by', // Zapisnicar
        'compiled_by', // sastavio
        'approved_by', // odobrio
        'tasks', // Zadatatci (JSON array field)
        'content', // Sadrzaj zapisnika
        'revision_id'
    ];

    protected $casts = [
        'tasks' => 'array'
    ];

    public function revision()
    {
        return $this->belongsTo(Revision::class);
    }
}
