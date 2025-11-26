<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Videojuego extends Model
{
    protected $fillable = [
        'nombre',
        'precio',
        'lanzamiento',
        'desarrolladora_id'
    ];

    protected $casts = [
        'lanzamiento' => 'datetime'
    ];

    public function getLanzamientoFormateadoAttribute():string{
        return fecha_larga($this->lanzamiento);
    }

    public function getPrecioFormateadoAttribute()
    {
        $formatter =  new \NumberFormatter('es_ES',\NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($this->precio,'EUR');
        //return number_format($valor,2,',','-'). ' €';
    }


    public function desarrolladora(): BelongsTo
    {
        return $this-> BelongsTo(Desarrolladora::class);
    }

    public function editora(): BelongsTo
    {
        return $this->desarrolladora->editora();
    }




}
