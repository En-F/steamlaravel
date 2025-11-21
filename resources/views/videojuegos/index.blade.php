<x-app-layout>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default"></div>
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <th scope="col" class="px-6 py-3 font-medium">Nombre</th>
            <th scope="col" class="px-6 py-3 font-medium">Precio</th>
            <th scope="col" class="px-6 py-3 font-medium">Lanzamiento</th>
            <th scope="col" class="px-6 py-3 font-medium">Nombre de Desarrolladora</th>
            <!-- <th scope="col" class="px-6 py-3 font-medium" colspan="2">Acciones</th> -->
        </thead>
        <tbody>
            @foreach ($videojuegos as $videojuego)
            <tr class="bg-neutral-primary border-b border-default">
                <td class="px-6 py-4">{{ $videojuego->nombre }}</td>
                <td class="px-6 py-4">{{ $videojuego->precio_formateado }}</td>
                <td class="px-6 py-4">{{ $videojuego->lanzamiento_formateado }}</td>
                <td class="px-6 py-4">{{ $videojuego->desarrolladora->denominacion }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
