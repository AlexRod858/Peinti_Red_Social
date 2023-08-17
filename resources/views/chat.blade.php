<x-app-layout>
    <div class="grid md:grid-cols-8 grid-cols-3">
        <!-- MENU IZQUIERDA -->
        <aside class="col-span-3 md:col-span-2 flex flex-col px-4 py-8 overflow-y-auto bg-indigo-50 border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700">

        </aside>


        <!-- ----------------------------------------------- -->
        <!-- ----------------------------------------------- -->
        <!-- --------------- MENU CENTRO  ------------------ -->
        <!-- ----------------------------------------------- -->
        <div class="w-full lg:col-span-5 md:col-span-4 col-span-3 flex flex-col h-screen"> <!-- Añadimos la clase flex-col y h-screen al contenedor padre -->
            <div class="flex flex-col flex-grow justify-end p-4 bg-white dark:bg-gray-800">

                @foreach ($chatsAbiertos as $usuario)
                <div class="mb-4">
                    <h2 class="font-bold text-lg">{{ $usuario->name }}</h2>
                    <ul class="space-y-2">
                        @foreach ($usuario->conversacion as $mensaje)
                        <li>
                            <div class="ml-5">
                                <p class="font-bold text-indigo-600">{{ $mensaje->emisor->name }}</p>
                                <p>{{ $mensaje->mensaje }}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach

            </div>
            <!-- ----------------------------------------------- -->
            <!-------------- Input y botón de enviar -------------->
            <!-- ----------------------------------------------- -->
            <div class="flex items-center justify-between bg-white p-4 dark:bg-gray-800">
                <input type="text" class="w-full py-2 px-4 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200 dark:bg-gray-700 dark:text-white" placeholder="Escribe un mensaje...">
                <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Enviar</button>
            </div>
        </div>

        <!-- ----------------------------------------------- -->
        <!-- ----------------------------------------------- -->
        <!-- ---------------  MENU DERECHA  ---------------- -->
        <!-- ----------------------------------------------- -->
        <aside class="hidden sm:block col-span-3 lg:col-span-1 md:col-span-2 md:flex flex-col w-full h-screen px-4 py-8 overflow-y-auto bg-indigo-50 border-l rtl:border-l-0 rtl:border-r dark:bg-gray-900 dark:border-gray-700 md:ml-auto">

        </aside>
    </div>
</x-app-layout>