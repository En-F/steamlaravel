<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $q = Genero::query();
        if ($buscar = $request->query('buscar')) {
            $q->whereLike('genero', "%$buscar%", false);
        }
        $sentido = $request->query('sentido') == 'desc' ? 'desc': 'asc';
        $q->orderBy('genero',$sentido);
        return view('generos.index', [

            'generos' => $q->paginate(5)->withQueryString() , //guarda la url completa
            'buscar' => $buscar,
            'sentido' => $sentido,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('generos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'genero' => 'required|max:255|unique:generos',
        ]);

        Genero::create($validate);
        return redirect()->route('generos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genero $genero)
    {
        return view('generos.edit',[
            'genero' => $genero,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genero $genero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genero $genero)
    {
       if ($genero->videojuegos()->exists()) {
            return back()->with('fallo', 'El género tiene videojuegos');
        }
        $genero->delete();
        return redirect()
            ->route('generos.index')
            ->with('exito', 'Género borrado correctamente');
    }
}
