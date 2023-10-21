<x-app-layout>
    <div class="grid md:grid-cols-8 grid-cols-3">
        <!-- MENU IZQUIERDA -->
        <aside class=" col-span-3 md:col-span-2 flex flex-col overflow-y-auto bg-indigo-50 border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700 ">
            <!-- ------------------------------------ -->
            <div class="flex justify-center items-center mt-6">
                <div class="w-96 h-96 bg-gray-200 rounded-lg flex justify-center items-center">
                    <img src="<?= $fotoperfil ?>" class="w-full h-full object-cover rounded-lg">
                </div>
                </label>
            </div>


            <!-- --------------------------------------- -->

            <div class="flex flex-col justify-between flex-1 mt-6">
                <nav>
                    <div class="container mt-5">

                        <!-- ---------------------------- -->
                        <!-- ---------------------------- -->
                        <!-- ---------------------------- -->

                        <h6 class="flex items-center px-4 py-2 text-gray-600 bg-indigo-100 border-b font-bold" href="#">Experiencia</h6>

                        @foreach ($experiencias as $experiencia)
                        <div class="container px-4 py-2">
                            <p class="font-bold">{{ $experiencia->rol }}</p>
                            <p class="text-sm">{{ $experiencia->empresa }}</p>
                            <p class="text-gray-600 text-sm">{{ $experiencia->duracion }}</p>
                        </div>
                        @endforeach
                    </div>
                    <div class="container mt-5">

                        <h5 class="flex items-center px-4 py-2 text-gray-600 bg-indigo-100 border-b font-bold">Educación</h5>

                        @foreach ($educaciones as $educacion)
                        <div class="container px-4 py-2">
                            <p class="font-bold">{{ $educacion->titulo }}</p>
                            <p class="text-sm">{{ $educacion->institucion }}</p>
                            <p class="text-gray-600 text-sm">{{ $educacion->duracion }}</p>
                        </div>
                        @endforeach
                    </div>
                </nav>

            </div>

        </aside>

        <!-- ----------------------------------------------- -->
        <!-- --------------- MENU CENTRO  ------------------ -->
        <!-- ----------------------------------------------- -->
        <!-- ----------------------------------------------- -->

        <div class="w-full lg:col-span-5 md:col-span-4 col-span-3">
            <!-- ---- M E N S A J E S    E S C R I B I R---- -->
            <!-- ----------------------------------------------- -->
            <!-- ----------------------------------------------- -->
            <h1 class="text-4xl container pl-5 my-5 font-bold"><?php echo $nombre . ' ' . $apellido1 . ' ' . $apellido2 ?></h1>
            <!--  -->
            <!---->
            <!-- ESTADO -->
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 w-full mt-5 flex items-center">
                <div class="flex-row w-full">
                    <textarea readonly id="message" rows="2" class="block p-2.5 w-full text-3xl text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $estado ?>"></textarea>
                </div>
            </form>
            <!--  -->
            <!--  -->
            <!--  -->
            <!-- ------------------------------------ -->
            <!--  E S P A C I O  P E R S O N A L -->
            <!-- ------------------------------------ -->
            <div class="flex-row container">
                <h3 class="text-xl font-bold container pl-5 my-5">Espacio personal</h3>
                <hr>

                <div class="flex items-center max-w mt-0 h-auto overflow-hidden  dark:bg-gray-800 md:flex-row md:justify-between">
                    <div class="w-full md:w-2/3 p-4 md:p-4">
                        <h1 class="text-xl font-bold text-blue-600 dark:text-white"><?php echo $tituloEspacio ?></h1>
                        <pre class="text-sm text-gray-600"><?php echo $fecha_creacionEspacio ?></pre>
                        <p class="mt-5 text-gray-800"><?php echo $descripcionEspacio ?></p>
                    </div>
                    <div class="w-full md:w-1/3 p-4 md:p-4 flex justify-center mt-3 md:mt-0">
                        <iframe width="320" height="240" src="<?php echo $urlEspacio ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
            <!-- ------------------------------------ -->
            <!-- ------------------------------------ -->
            <!-- ------------------------------------ -->

            <!--  -->
            <!--  -->
            <!--  -->
            <!--  -->

            <!-- Formulario -->
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 w-full mt-5 flex items-center" action="{{ route('enviar_mensaje') }}" method="post">
                @csrf
                <img class="w-16 h-16 rounded-full mr-4" src="<?= $miFotoperfil ?>">
                <div class="flex-row w-full">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tablón</label>
                    <textarea rows="4" name="mensaje" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escribe aquí..."></textarea>

                    <!-- Agregar el campo oculto para el ID del usuario receptor -->
                    <input type="hidden" name="usuario_id_receptor" value="{{ $userAmigo->id }}">

                    <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded text-xs" type="submit">Publicar</button>
                </div>
            </form>

            <!-- ----------------------------------------------- -->
            <!-- ------------- M E N S A J E S ----------------- -->
            <!-- ----------------------------------------------- -->
            <div class="flex-row container">
                @foreach ($mensajesTablon as $mensaje)
                <div class="flex items-center max-w mt-2 h-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    @if ($mensaje->emisor)
                    <img class="w-16 h-16 rounded-full mr-4 ml-3" src="{{ $mensaje->emisor->fotoperfil }}">
                    <div class="w-2/3 p-4 md:p-4">
                        <h1 class="text-xl font-bold text-blue-600 dark:text-white">{{ $mensaje->emisor->name }}</h1>
                        <pre class="text-sm text-gray-600">{{ $mensaje->created_at }}</pre>
                        <p class="mt-5 text-gray-800">{{ $mensaje->mensaje }}</p>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>


        </div>
        <!-- ----------------------------------------------- -->
        <!-- ----------------------------------------------- -->
        <!-- ---------------  MENU DERECHA  ---------------- -->
        <!-- ----------------------------------------------- -->
        <aside class="hidden sm:block col-span-3 lg:col-span-1 md:col-span-2 md:flex flex-col w-full h-screen px-4 py-8 overflow-y-auto bg-indigo-50 border-l rtl:border-l-0 rtl:border-r dark:bg-gray-900 dark:border-gray-700 md:ml-auto">

            <div class="flex flex-col justify-between mt-1">

                <!--  -->
                <div class="container">
                    <h6 class="flex items-center pl-2 py-2 mt-1 text-gray-600 bg-indigo-100 border-b font-bold" href="#">Obras</h6>
                    <div class="container grid grid-cols-2 gap-4">
                        <img class="w-24 h-24 object-cover rounded" src="https://us.123rf.com/450wm/tuktukdesign/tuktukdesign1608/tuktukdesign160800062/61010897-icono-de-usuario-mujer-perfil-avatar-ilustraci%C3%B3n-vectorial-persona-glifo.jpg" alt="Imagen cuadrada">
                        <img class="w-24 h-24 object-cover rounded" src="https://us.123rf.com/450wm/tuktukdesign/tuktukdesign1608/tuktukdesign160800062/61010897-icono-de-usuario-mujer-perfil-avatar-ilustraci%C3%B3n-vectorial-persona-glifo.jpg" alt="Imagen cuadrada">
                        <img class="w-24 h-24 object-cover rounded" src="https://us.123rf.com/450wm/tuktukdesign/tuktukdesign1608/tuktukdesign160800062/61010897-icono-de-usuario-mujer-perfil-avatar-ilustraci%C3%B3n-vectorial-persona-glifo.jpg" alt="Imagen cuadrada">
                        <img class="w-24 h-24 object-cover rounded" src="https://us.123rf.com/450wm/tuktukdesign/tuktukdesign1608/tuktukdesign160800062/61010897-icono-de-usuario-mujer-perfil-avatar-ilustraci%C3%B3n-vectorial-persona-glifo.jpg" alt="Imagen cuadrada">
                    </div>
                </div>
                <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded text-xs">Ver todas</button>

            </div>


            <!--  -->
            <!--  -->
            </nav>
    </div>

    </aside>
    </div>
</x-app-layout>