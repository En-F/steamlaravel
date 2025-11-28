<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genero extends Model
{
    protected $fillable = [
        'genero',
    ];

    public function videojuegos(): BelongsToMany{
        return $this->belongsToMany(Videojuego::class)->withTimestamps();
    }public function save(array $options = [])
    {
        return parent::save($options);
    }
}
