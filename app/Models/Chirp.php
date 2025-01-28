<?php

namespace App\Models;

use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    // Mass assignement protection .. Aller voir la documentation pour comprendre mieux.
    protected $fillable = [
        'message',
    ];

    // Dispatch the event cirpCreated a chaque création de Chirp
    protected $dispatechesEvents = [
        'created' => ChirpCreated::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
