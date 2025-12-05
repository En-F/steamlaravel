<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PruebasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        if(app()->environment('local')){

            $editora_id = DB::table('editoras')->insertGetId([
            'nombre'=>'Steam',
        ]);

        $desarrolladora_id = DB::table('desarrolladoras')->insertGetId([
            'denominacion'=>'Valve',
            'editora_id'=>$editora_id,
        ]);

        DB::table('videojuegos')->insertGetId([
            'nombre'=>'Half life',
            'precio' => 29.99,
            'lanzamiento' => Carbon::yesterday(),
            'desarrolladora_id'=>$desarrolladora_id,
        ]);

        DB::table('generos')->insert([
            ['genero' => 'Ciendia-ficcion'],
            ['genero' => 'Terror'],
            ['genero' => 'Arcade'],
            ['genero' => 'Sangre'],
            ['genero' => 'Plataformar'],
            ['genero' => 'Mundo Abierto'],
            ['genero' => 'Lucha 2D'],
            ['genero' => 'Lucha 4D'],
            ['genero' => 'Disparos'],
            ['genero' => 'Lógica'],
            ['genero' => 'Puzzles'],
            ['genero' => 'Ajedrez']
        ]);

        DB::table('hardware')->insert([
            ['nombre' => 'Steam Controller','descripcion'=> '...','precio'=> 80.00],
            ['nombre' => 'Steam Machine','descripcion'=> '...','precio'=> 800.00]
        ]);

        }

    }
}
