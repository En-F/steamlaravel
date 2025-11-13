<?php

use App\Models\Cliente;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    $nombre = Request()->query('nombre');
    $nombre = request(key: 'nombre');
    return "Hola, $nombre";
});


Route::get('/clientes',function(){
    return view('clientes.index',[
        'clientes' => Cliente::all(),
    ]);
});


Route::get('/clientes/create',function(){
    return view('clientes.create');
    // Cliente::create([
    //     'dni' => '3333',
    //     'nombre' => 'Ronaldo',
    //     'apellidos' => 'Franco',
    //     'direccion' => 'Calle Ancha 89',
    //     'codpostal'=> 19840,
    //     'telefono' => '123456789'
    // ]);
});

//marcador {} representa un valor que luego se va a recoger
Route::delete('/clientes/borrar/{cliente}',function(Cliente  $cliente){
    $cliente->delete();

    //redireccion a otra página con un respons, pero se modifica para que nos deje en otro lado
    return redirect('/clientes');
});



