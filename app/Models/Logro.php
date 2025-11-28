<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Logro extends Model
{
    protected $fillable = [
        'descripcion',
        'videojuego_id'
    ];

    public function videojuego(): BelongsTo{
        return $this->belongsTo(Videojuego::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}

