<x-app-layout>
    <div class="container mt-2">
        <a href="../obras" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mb-4">Volver</a>
    </div>
    <!-- AMBAS COLUMNAS -->
    <div class="flex items-center justify-center mt-8">
        <div class="grid grid-cols-2 w-3/4">
            <!-- Contenedor principal con altura personalizada -->
            <div class="flex justify-end justify-items-end h-128">
                <!-- Columna izquierda (detalles de la publicación) -->
                <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-col md:max-w-xl dark:border-gray-700 dark:bg-gray-800">
                    <img class="pt-6 object-cover w-full md:h-80 md:w-80" src="{{ $publicacion->foto }}" alt="">
                    <div class="flex flex-col justify-between p-6 leading-normal">
                        <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $publicacion->titulo }}</h5>
                        <p class="mb-3 text-xl font-normal text-gray-700 dark:text-gray-400">{{ $publicacion->descripcion }}</p>
                        <p class="mb-3 text-xl font-normal text-gray-700 dark:text-gray-400">{{ $publicacion->medidas }}</p>
                        <p class="mb-3 text-xl font-normal text-gray-700 dark:text-gray-400">{{ $publicacion->fecha }}</p>
                    </div>
                </div>
            </div>
            <!-- Columna derecha (comentarios de las obras) -->
            <div class="h-12">
                <div class="overflow-y-auto">
                    <div class="flex flex-col items-center bg-indigo-100 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col p-6">
                            <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-white">Comentarios</h5>
                            <!--  -->
                            <div class="flex-row container box-content">
                                @foreach ($comentario as $comentarios)
                                <div class="flex items-center bg-white shadow-lg dark:bg-gray-800">
                                    <img class="w-16 h-16 ml-3" src="{{ $comentarios->usuario->fotoperfil }}">
                                    <div class="w-2/3 p-4 md:p-4">
                                        <h1 class="text-xl font-bold text-blue-600 dark:text-white">{{ $comentarios->usuario->name }}</h1>
                                        <pre class="text-sm text-gray-600">{{ $comentarios->created_at }}</pre>
                                        <p class="mt-5 text-gray-800">{{ $comentarios->contenido }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!--  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>