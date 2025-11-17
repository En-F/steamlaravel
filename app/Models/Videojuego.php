<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Videojuego extends Model
{
    public function desarrolladora(): HasOne
    {
        return $this-> hasOne(Desarrolladora::class);
    }
}
