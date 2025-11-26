<?php

use App\Http\Controllers\EditoraController;
use App\Http\Controllers\VideojuegoController;
use App\Models\Cliente;
use App\Models\Videojuego;
use Illuminate\Http\Request;
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
})->name('clientes.index');


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

//cliente es el nombre de la tabla si quieres ponerle el nombre del modelo le tienes que dar la ruta
// del modelo
Route::post('/clientes', function(Request  $request){
    $validated = $request->validate([
        'dni'=>'required|max:9|unique:clientes',
        'nombre'=>'required|max:255',
        'apellidos'=>'nullable|max:255',
        'direccion'=>'nullable|max:255',
        'cospostal'=> 'nullable|numeric|decimal:0|digits:5',
        'telefono' => 'nullable|max:255'
    ]);
    Cliente::create($validated);
        return redirect('/clientes');
});


//marcador {} representa un valor que luego se va a recoger
Route::delete('/clientes/{cliente}',function(Cliente  $cliente){
    $cliente->delete();

    //redireccion a otra página con un respons, pero se modifica para que nos deje en otro lado
    return redirect('/clientes');
});


Route::get('/clientes/{cliente}/edit', function(Cliente $cliente){
    return view('clientes.edit',[
        'cliente' => $cliente,
    ]);
});


Route::put('/clientes/{cliente}', function(Cliente $cliente,Request $request){
    $validated = $request->validate([
            'dni'=>'required|max:9|unique:clientes,dni,' . $cliente->id,
            'nombre'=>'required|max:255',
            'apellidos'=>'nullable|max:255',
            'direccion'=>'nullable|max:255',
            'cospostal'=> 'nullable|numeric|decimal:0|digits:5',
            'telefono' => 'nullable|max:255'
        ]);
        $cliente->update($validated);
        return redirect('/clientes');
});


// Route::get('/Videojuegos',[Videojuegocontroller::class,'index']);
// Route::get('/Videojuegos',[Videojuegocontroller::class,'create']);

//Equivalente a poner las 7 rutas
Route::resource('videojuegos',VideojuegoController::class);
Route::resource('editoras',EditoraController::class);




