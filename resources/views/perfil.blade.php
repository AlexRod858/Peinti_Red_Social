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

                        <!-- --------------------------------------------------------- -->
                        <!-- --------------------------------------------------------- -->
                        <!-- ------------ M O D A L  E X P E R I E N C I A ----------- -->
                        <!-- --------------------------------------------------------- -->
                        <div class="max-w-2xl mx-auto">
                            <!-- Modal toggle -->
                            <a href="#" data-modal-toggle="experiencia-modal" class="text-sm text-blue-500">Añadir experiencia</a>
                            <!-- Main modal -->
                            <div id="experiencia-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                <div class="relative w-full max-w-md px-4 h-full md:h-auto">

                                    <!-- Modal content -->
                                    <div class="bg-indigo-50 rounded-lg shadow relative dark:bg-gray-700  border-2 border-slate-800">

                                        <!-- Botón 'X' -->
                                        <div class="flex justify-end p-2">
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white " data-modal-toggle="experiencia-modal">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <!--  -->
                                        <h3 class="mb-2 text-2xl text-center font-bold text-gray-800">
                                            Nueva Experiencia
                                        </h3>
                                        <!--  -->
                                        <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('añadir_experiencia') }}" method="POST">
                                            @csrf
                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                        Rol
                                                    </label>
                                                    <input class="appearance-none block w-full bg-white text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="rol" type="text" placeholder="Profesor de dibujo">
                                                </div>
                                                <div class="w-full md:w-1/2 px-3">
                                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                                        Empresa
                                                    </label>
                                                    <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="empresa" type="text" placeholder="Escuela Juan Martín">
                                                </div>
                                                <div class="w-full md:w-1/2 px-3">
                                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                                        Duración
                                                    </label>
                                                    <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="duracion" type="text" placeholder="3 años">
                                                </div>
                                            </div>
                                            <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-sm" type="submit">
                                                Añadir
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script> -->
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
                        <!-- --------------------------------------------------------- -->
                        <!-- --------------------------------------------------------- -->
                        <!-- ------------ M O D A L  E D U C A C I O N ----------- -->
                        <!-- --------------------------------------------------------- -->
                        <div class="max-w-2xl mx-auto">
                            <!-- Modal toggle -->
                            <a href="#" data-modal-toggle="educacion-modal" class="text-sm text-blue-500">Añadir educacion</a>
                            <!-- Main modal -->
                            <div id="educacion-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                <div class="relative w-full max-w-md px-4 h-full md:h-auto">

                                    <!-- Modal content -->
                                    <div class="bg-indigo-50 rounded-lg shadow relative dark:bg-gray-700   border-2 border-slate-800">

                                        <!-- Botón 'X' -->
                                        <div class="flex justify-end p-2">
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="educacion-modal">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <!--  -->
                                        <h3 class="mb-2 text-2xl text-center font-bold text-gray-800">
                                            Nueva Educación
                                        </h3>
                                        <!--  -->
                                        <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('añadir_educacion') }}" method="POST">
                                            @csrf
                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                        Institucion
                                                    </label>
                                                    <input class="appearance-none block w-full bg-white text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="institucion" type="text" placeholder="Profesor de dibujo">
                                                </div>
                                                <div class="w-full md:w-1/2 px-3">
                                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                                        Título
                                                    </label>
                                                    <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="titulo" type="text" placeholder="Escuela Juan Martín">
                                                </div>
                                                <div class="w-full md:w-1/2 px-3">
                                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                                        Duración
                                                    </label>
                                                    <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="duracion" type="text" placeholder="3 años">
                                                </div>
                                            </div>
                                            <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-sm" type="submit">
                                                Añadir
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script> -->
                        <!-- ---------------------------- -->
                        <!-- ---------------------------- -->
                        <!-- ---------------------------- -->

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
                        <h1 class="text-2xl font-bold text-blue-600 dark:text-white"><?php echo $tituloEspacio ?></h1>
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

            <!-- ----------------------------------------------- -->
            <!-- ------------- M E N S A J E S ----------------- -->
            <!-- ----------------------------------------------- -->
            <div class="flex-row container">
                @foreach ($tablones as $tablon)
                <div class="flex items-center max-w mt-2 h-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <img class="w-16 h-16 rounded-full mr-4 ml-3" src="{{ $tablon->emisor->fotoperfil }}">
                    <div class="w-2/3 p-4 md:p-4">
                        <h1 class="text-xl font-bold text-blue-600 dark:text-white">{{ $tablon->emisor->name }}</h1>
                        <pre class="text-sm text-gray-600">{{ $tablon->created_at }}</pre>
                        <p class="mt-5 text-gray-800">{{ $tablon->mensaje }}</p>
                    </div>
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
                        <img class="w-24 h-24 object-cover rounded" src="https://img.freepik.com/vector-gratis/escena-verano-pixel-art-plano_23-2149457881.jpg" alt="Imagen cuadrada">
                        <img class="w-24 h-24 object-cover rounded" src="https://png.pngtree.com/thumb_back/fh260/background/20220607/pngtree-pixel-art-sky-cloud-game-image_1406560.jpg" alt="Imagen cuadrada">
                        <img class="w-24 h-24 object-cover rounded" src="https://img.freepik.com/vector-gratis/fondo-mistico-arte-pixel_52683-87349.jpg" alt="Imagen cuadrada">
                        <img class="w-24 h-24 object-cover rounded" src="https://img.freepik.com/vector-premium/pixel-art-cielo-estrellado-puesta-sol-luna-nubes-estrellas-ilustraciones-vectoriales-eps10-bylayer_148553-721.jpg" alt="Imagen cuadrada">
                    </div>
                </div>
                <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded text-xs mt-6">Ver todas</button>

            </div>


            <!--  -->
            <!--  -->
            </nav>
    </div>

    </aside>
    </div>
</x-app-layout>