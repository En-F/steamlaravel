<x-app-layout>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default"></div>
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <th scope="col" class="px-6 py-3 font-medium">Usuario</th>
            <th scope="col" class="px-6 py-3 font-medium">Videosjuego</th>
            <th scope="col" class="px-6 py-3 font-medium">Hardware</th>
            <!-- <th scope="col" class="px-6 py-3 font-medium" colspan="2">Acciones</th> -->
        </thead>
        <tbody>
            <tr class="bg-neutral-primary border-b border-default">
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->email }}</td>
                @foreach ($user as user)

                @endforeach
                <td>{{ $user->videojuegos->nombre }}</td>
                <td class="px-6 py-4">
                    <form action="{{ route('videojuegos.destroy', $videojuego->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Borrar</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="videojuegos/create">
        Crear videojuego
    </a>
</x-app-layout>
