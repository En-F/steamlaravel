<x-app-layout>
    <form action="{{ route('generos.index') }}" method="get"
    >
    @csrf
        <div class="flex w-full ">
            <label for="buscar" class="floating-label">
                <span>Buscar</span>
                <input class="input" type="text" name="buscar" id="buscar"
                value="{{ $buscar }}">
            </label>
            <button class="btn btn-primary" type="submit">Buscar</button>
            <a class="btn btn-ghost" href="{{ route('generos.index') }}">Limpiar</a>
        </div>
    </form>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default"></div>
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <th scope="col" class="px-6 py-3 font-medium">
                <a class="btn btn-ghost" href="{{$request->fullUrlWithQuery(['Ascendente'])}}">Género</a>
            </th>

            <!-- <th scope="col" class="px-6 py-3 font-medium" colspan="2">Acciones</th> -->
        </thead>
        <tbody>
            @foreach ($generos as $genero)
            <tr class="bg-neutral-primary border-b border-default">
                <td class="px-6 py-4">{{ $genero->genero }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $generos->links() }}
    <br>
    <a href="generos/create">
        Crear genero
    </a>
</x-app-layout>
