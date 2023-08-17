<x-app-layout>
    <div class="grid md:grid-cols-8 grid-cols-3">
        <aside class="col-span-3 md:col-span-2 flex flex-col  px-4 py-8 overflow-y-auto bg-indigo-50 border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700">
            <div class="flex flex-col justify-between mt-1">
                <!--  -->
                <div class="container">
                    <h6 class="flex items-center pl-2 py-2 mt-1 text-gray-600 bg-indigo-100 border-b font-bold" href="#">Álbumes</h6>
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div class="flex flex-col items-center">
                            <img class="w-24 h-24 object-cover rounded mb-2" src="https://us.123rf.com/450wm/tuktukdesign/tuktukdesign1608/tuktukdesign160800062/61010897-icono-de-usuario-mujer-perfil-avatar-ilustraci%C3%B3n-vectorial-persona-glifo.jpg" alt="Imagen cuadrada">
                            <p class="text-sm text-gray-600">Álbum 1</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <img class="w-24 h-24 object-cover rounded mb-2" src="https://us.123rf.com/450wm/tuktukdesign/tuktukdesign1608/tuktukdesign160800062/61010897-icono-de-usuario-mujer-perfil-avatar-ilustraci%C3%B3n-vectorial-persona-glifo.jpg" alt="Imagen cuadrada">
                            <p class="text-sm text-gray-600">Álbum 2</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <img class="w-24 h-24 object-cover rounded mb-2" src="https://us.123rf.com/450wm/tuktukdesign/tuktukdesign1608/tuktukdesign160800062/61010897-icono-de-usuario-mujer-perfil-avatar-ilustraci%C3%B3n-vectorial-persona-glifo.jpg" alt="Imagen cuadrada">
                            <p class="text-sm text-gray-600">Álbum 3</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <img class="w-24 h-24 object-cover rounded mb-2" src="https://us.123rf.com/450wm/tuktukdesign/tuktukdesign1608/tuktukdesign160800062/61010897-icono-de-usuario-mujer-perfil-avatar-ilustraci%C3%B3n-vectorial-persona-glifo.jpg" alt="Imagen cuadrada">
                            <p class="text-sm text-gray-600">Álbum 4</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- ----------------------------------------------- -->
        <!-- --------------- MENU CENTRO  ------------------ -->
        <!-- ----------------------------------------------- -->
        <!-- ----------------------------------------------- -->
        <div class="w-full lg:col-span-5 md:col-span-4 col-span-3">
            <h1 class="text-4xl font-bold container pl-5 my-5">OBRAS</h1>
            <div class="flex flex-col justify-between mt-1">
                <!--  -->
                <div class="container">
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        @foreach ($publicaciones as $publicacion)
                        <div class="flex flex-col items-center">
                            <a href="">
                                <img class="w-48 h-48 object-cover rounded mb-2" src="https://us.123rf.com/450wm/tuktukdesign/tuktukdesign1608/tuktukdesign160800062/61010897-icono-de-usuario-mujer-perfil-avatar-ilustraci%C3%B3n-vectorial-persona-glifo.jpg" alt="Imagen cuadrada">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- ----------------------------------------------- -->
        <!-- ----------------------------------------------- -->
        <!-- ----------------------------------------------- -->
        <!-- -----------------  MENU DERECHA  -------------------- -->
        <aside class="hidden sm:block col-span-3 lg:col-span-1 md:col-span-2 md:flex flex-col w-full h-screen px-4 py-8 overflow-y-auto bg-indigo-50 border-l rtl:border-l-0 rtl:border-r dark:bg-gray-900 dark:border-gray-700 md:ml-auto">

        </aside>
    </div>
</x-app-layout>