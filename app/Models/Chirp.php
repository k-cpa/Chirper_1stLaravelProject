<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    // Mass assignement protection .. Aller voir la documentation pour comprendre mieux.
    protected $fillable = [
        'message',
    ];
}
