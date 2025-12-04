<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Relations\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PhpParser\Node\Expr\FuncCall;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //HasOne se pone cuando es 0 a 1
    public function cliente(): HasOne{
        return $this->hasOne(Cliente::class);
    }

    public function videojuegos(): MorphToMany{
        return $this->morphedByMany(Videojuego::class,'adquirible');

    }

    public function hardware(): MorphToMany{
        return $this->morphedByMany(Hardware::class,'adquirible');

    }


    public function logros(){
        return $this->belongsToMany(Logro::class);
    }



}
