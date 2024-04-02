<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class SurveyToken extends Model
{
    use HasFactory;

    protected $fillable = ['token', 'user_id', 'revision_id', 'used'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function revision()
    {
        return $this->belongsTo(Revision::class);
    }

    public static function generateToken($userId, $revisionId)
    {
        do {
            $token = Str::random(64);
        } while (self::where('token', $token)->exists()); // Ensure uniqueness

        return self::create([
            'token' => $token,
            'user_id' => $userId,
            'revision_id' => $revisionId,
            'used' => false,
        ]);
    }
}
