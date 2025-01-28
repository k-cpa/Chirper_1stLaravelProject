<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    // Mass assignement protection .. Aller voir la documentation pour comprendre mieux.
    protected $fillable = [
        'message',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
