<x-app-layout>
    <x-errores />
    <div>
        <h2 class="text-2xl  font-bold mb-3">Insertar un videojuego</h2>
         <form action="{{ route('generos.store') }}" method="POST" class="card bg-base-200 p-6 shadow">
            @csrf
            <label for="nombre" class="floating-label">
                <span>Genero:*</span>
                <input class="input" type="text" id="genero" name="genero" value="{{ old('genero') }}"><br>
            </label>
            <div class="flex-2">
                <button class="btn btn-soft btn-success" type="submit">Insertar</button>
                <a href="{{route('generos.index')}}" class="btn btn-soft btn-info">Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>
