<?php

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
        'nombre' => 'Pepito',
    ]);
});


// Route::get('/clientes/create',function(){
//     return view('clientes.create');
// });
