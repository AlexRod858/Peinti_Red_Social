<x-app-layout>
    <!-- Tabla de contactos -->
    <div class="bg-white dark:bg-gray-800 rounded-md p-4 mt-4 h-screen">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-2 py-2"></th>
                    <th class="px-4 py-2"></th>
                    <th class="px-4 py-2 text-right"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($amigos as $amigo)

                <tr class="bg-gray-100 dark:bg-gray-700">
                    <td class="px-2 py-2">
                        <img class="w-9 h-9 rounded-full mr-2" src="{{ $amigo->fotoperfil }}" alt="{{ $amigo->fotoperfil }}">
                    </td>
                    <td class="px-4 py-2">
                        <a href="{{ route('verperfil', ['id' => $amigo->id]) }}">
                            {{ $amigo->name }}
                        </a>
                    </td>
                    <td class="px-4 py-2 text-right">
                        <div class="flex justify-end">
                            <button class="text-xs px-2 py-1 bg-indigo-500 hover:bg-indigo-700 text-white font-bold rounded mr-2">Enviar mensaje</button>
                            <form action="{{ route('eliminar_amigo', ['id' => $amigo->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-xs px-2 py-1 bg-red-500 hover:bg-red-700 text-white font-bold rounded">Eliminar amigo</button>
                            </form>
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>