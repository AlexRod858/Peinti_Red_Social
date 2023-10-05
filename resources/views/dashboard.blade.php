<x-app-layout>
    <div class="grid md:grid-cols-8 grid-cols-3">
        <!-- MENU IZQUIERDA -->
        <aside class=" col-span-3 md:col-span-2 flex flex-col px-4 py-8 overflow-y-auto bg-indigo-50 border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700 ">
            <div class="flex items-center bg-white shadow">

                <img class="w-16 h-16 " src="<?= $fotoperfil ?>" alt="fotoperfil">

                <div class="flex-col ml-5">
                    <p class="font-bold text-indigo-600"><?= $nombre . ' ' . $apellido1 ?></p>
                    <p><?= $visitas ?> visitas a tu perfil</p>
                </div>
            </div>
            <hr>

            <div class="flex flex-col justify-between p-3 mt-3 bg-white">
                <nav>
                    <div class="container">
                        <h6 class="flex items-center px-4 py-2 mt-5 text-gray-600  bg-indigo-100 border-b font-bold">Encuentra a tus amigos</h6>
                        <hr class=" mt-2">
                        <!--  -->
                        <div class="container px-4 py-2">
                            <p class="font-bold"><?= $invitaciones ?> invitaciones</p>
                            <div class="flex items-center md:flex-row">
                                <input type="text" class="w-3/4 md:w-3/5 px-2 py-1 md:mr-2 mb-2 md:mb-0">
                                <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Encontrar</button>
                            </div>
                        </div>
                        <!--  -->
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
            <h1 class="text-4xl font-bold container pl-5 my-5"><?= $nombre . ' ' . $apellido1 ?></h1>



            <!-- ACTUALIZAR  ESTADO -->
            <!-- ACTUALIZAR  ESTADO -->
            <form action="{{ route('actualizar-estado') }}" method="POST" class="bg-white shadow-md rounded mb-6 px-8 pt-6 pb-8 w-full mt-5 flex-col items-center">
                @csrf
                <div class="flex-row w-full">
                    <textarea name="estado" id="message" rows="2" class="block p-2.5 w-full text-3xl text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?= $estado ?? 'Ingrese su estado' ?>"></textarea>
                </div>

                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
            </form>

            <!-- Mostrar mensaje de éxito -->
            @if(session('success'))
            <div class="bg-green-500 text-white font-bold py-2 px-4 rounded">
                {{ session('success') }}
            </div>
            @endif
            <!-- ----------------------------------------------- -->
            <!-- ------------- P U B L I C A C I O N ----------- -->
            <!-- ----------------------------------------------- -->
            <div class="container">


                @foreach ($publicacionesAmigos as $publicacion)
                <div class="flex  ml-3">
                    <a href="">
                        <h4 class="text-blue-600 font-bold">
                            {{ $publicacion->usuario->name }}
                        </h4>
                    </a>
                    <h4 class="ml-2">
                        ha subido una nueva publicación:
                    </h4>
                </div>
                <a href="<?= 'publicacion/' . $publicacion->id ?>">
                    <div class="flex-row container mb-5">
                        <div class="flex items-center max-w mt-0 h-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 md:flex-row md:justify-between">
                            <div class="w-full md:w-2/3 p-4 md:p-4">
                                <!-- Aquí puedes acceder a los detalles de la publicación utilizando la variable $publicacion -->
                                <h1 class="text-xl font-bold text-blue-600 dark:text-white">{{ $publicacion->titulo }}</h1>
                                <pre class="text-sm text-gray-600">{{ $publicacion->created_at }}</pre>
                                <p class="mt-5 text-gray-800">{{ $publicacion->descripcion }}</p>

                                <div class="mt-4 flex items-center space-x-4">


                                    
                                    <button class="hover:text-red-700 text-red-500 font-bold flex" onclick="handleLikeClick()">
                                        <svg id="likeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                        </svg>
                                        <!--  -->
                                        <p class="text-red-800">
                                        {{ $publicacion->me_gusta }}
                                        </p>
                                        <!--  -->
                                    </button>

                                    <button class="hover:text-yellow-500 text-yellow-300 font-bold flex" onclick="handleLoveClick()">
                                        <svg id="loveIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                        </svg>
                                        <!--  -->
                                        <p class="text-yellow-600">
                                             {{ $publicacion->favoritos }}
                                            <!-- </p> -->
                                    </button>
                                    
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 p-4 md:p-4 flex justify-center mt-3 md:mt-0">
                                <img class="w-full h-auto max-w-32 max-h-32" src="{{ $publicacion->foto }}">
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach

                <script>
                    function handleLikeClick() {
                        const likeIcon = document.getElementById('likeIcon');
                        const currentFill = likeIcon.getAttribute('fill');

                        if (currentFill === 'red') {
                            likeIcon.setAttribute('fill', 'white');
                        } else {
                            likeIcon.setAttribute('fill', 'red');
                        }
                    }

                    function handleLoveClick() {
                        const loveIcon = document.getElementById('loveIcon');
                        const currentFill = loveIcon.getAttribute('fill');

                        if (currentFill === 'yellow') {
                            loveIcon.setAttribute('fill', 'white');
                        } else {
                            loveIcon.setAttribute('fill', 'yellow');
                        }
                    }
                </script>
            </div>
        </div>
        <!-- ----------------------------------------------- -->
        <!-- ----------------------------------------------- -->
        <!-- ----------------------------------------------- -->
        <!-- -----------------  MENU DERECHA  -------------------- -->
        <aside class="hidden sm:block col-span-3 lg:col-span-1 md:col-span-2 md:flex flex-col w-full h-screen px-4 py-8 overflow-y-auto bg-indigo-50 border-l rtl:border-l-0 rtl:border-r dark:bg-gray-900 dark:border-gray-700 md:ml-auto">
            <div class="flex flex-col justify-between flex-1 mt-1">
                <nav>
                    <div class="container ">
                        <!-- Contenido de texto -->
                        <div class="col-span-1">
                            <h6 class="flex items-center pl-2 py-2 text-gray-600 bg-indigo-100 border-b font-bold" href="#">Sugerencias de amistad</h6>

                            @foreach ($amigosDeAmigos as $amigoDeAmigo)
                            <div class="container py-2 max-w-full sm:max-w-md md:max-w-full flex items-center">
                                <!-- Enlace al perfil del amigo de amigo -->
                                <a href="{{ route('verperfil', $amigoDeAmigo->id) }}" class="flex items-center">
                                    <!-- Información del amigo de amigo -->
                                    <div class="container">
                                        <p class="font-bold">{{ $amigoDeAmigo->name }}</p>
                                        <p class="text-sm">{{ $amigoDeAmigo->apellido1 }} {{ $amigoDeAmigo->apellido2 }}</p>
                                        <form action="{{ route('enviar_solicitud_amistad', ['id' => $amigoDeAmigo->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded text-xs">Enviar</button>
                                        </form>
                                    </div>
                                    <!-- Imagen cuadrada -->
                                    <div class="container">
                                        <img class="p-2 w-24 h-24 object-cover rounded" src="{{ $amigoDeAmigo->fotoperfil }}" alt="Imagen cuadrada">
                                    </div>
                                </a>
                            </div>
                            @endforeach

                        </div>

                    </div>
                </nav>
            </div>


        </aside>
    </div>
</x-app-layout>