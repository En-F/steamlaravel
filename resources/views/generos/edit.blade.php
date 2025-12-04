<x-app-layout>
    <x-errores />
    <form action="{{route('generos.index')}}" method="POST">
        @method('PUT')
        @csrf
        <label for="genero">Genero:* </label>
        <input type="text" id="genero" name="genero" value="{{ old('genero', $genero->genero) }}"><br>
        <button class="btn btn-ghost">
            <a href="">Modificar</a>
        </button>

        <button class="btn btn-ghost">
            <a href="{{ route('generos.index') }}">Volver</a>
        </button>
    </form>
</x-app-layout>
