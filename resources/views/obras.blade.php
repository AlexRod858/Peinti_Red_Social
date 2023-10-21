<x-app-layout>
    <div class="grid md:grid-cols-8 grid-cols-2">
        <!-- ----------------------------------------------- -->
        <!-- -----------------  MENU DERECHA  -------------------- -->
        <aside class="hidden sm:block col-span-3 lg:col-span-1 md:col-span-2 md:flex flex-col w-full h-screen px-4 py-1 overflow-y-auto bg-indigo-50 border-l rtl:border-l-0 rtl:border-r dark:bg-gray-900 dark:border-gray-700 md:ml-auto">
            <h1 class="text-4xl font-bold container pl-5 my-5">OBRAS</h1>

            <div class="flex flex-col justify-between mt-1">

                <!--  -->

                <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded text-xs">Nueva Publicación</button>

            </div>
        </aside>

        <!-- ----------------------------------------------- -->
        <!-- --------------- MENU CENTRO  ------------------ -->
        <!-- ----------------------------------------------- -->
        <!-- ----------------------------------------------- -->
        <div class="w-full lg:col-span-7 md:col-span-4 col-span-3 pt-9 mt-10">
    <div class="flex flex-col justify-between mt-1">
        <!--  -->
        <div class="container">
            <div class="grid grid-cols-2 gap-4 mt-4">
                @foreach ($publicaciones as $publicacion)
                <div class="flex flex-col items-center relative font-medium hover:font-bold">
                    <a href="<?= 'publicacion/' . $publicacion->id ?>">
                        <img class="w-48 h-48 object-cover rounded mb-2" src="<?= $publicacion->foto ?>" alt="Imagen cuadrada">
                    </a>
                    <p class=" bottom-0 left-0 bg-white p-2">{{ $publicacion->titulo }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

        <!-- ----------------------------------------------- -->
        <!-- ----------------------------------------------- -->

    </div>
</x-app-layout>