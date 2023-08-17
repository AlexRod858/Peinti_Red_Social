<nav x-data="{ open: false }" class="bg-indigo-600 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <!-- <img src="#" alt="" width="100"> -->
                        <h1 class="text-white text-3xl font-bold font-sans ml-2">PEINTI</h1>
                    </a>

                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex ">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-indigo-200">
                        Inicio
                    </x-nav-link>
                </div>
                <!--  -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('perfil')" class="text-white hover:text-indigo-200">
                        Perfil
                    </x-nav-link>
                </div>
                <!--  -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('mensajes')" class="text-white hover:text-indigo-200">
                        Mensajes
                    </x-nav-link>
                </div>
                <!--  -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('gente')" class="text-white hover:text-indigo-200">
                        Gente
                    </x-nav-link>
                </div>
                <!--  -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('obras')" class="text-white hover:text-indigo-200">
                        Obras
                    </x-nav-link>
                </div>
                <!--  -->
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-indigo-600 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="text-white">{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Mi perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-indigo-50 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" class="text-indigo-50">
                Inicio
            </x-responsive-nav-link>
        </div>
        <!--  -->
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('perfil')" class="text-indigo-50">
                Perfil
            </x-responsive-nav-link>
        </div>
        <!--  -->
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('mensajes')" class="text-indigo-50">
                Mensajes
            </x-responsive-nav-link>
        </div>
        <!--  -->
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('gente')" class="text-indigo-50">
                Gente
            </x-responsive-nav-link>
        </div>
        <!--  -->
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('obras')" class="text-indigo-50">
                Cuadros
            </x-responsive-nav-link>
        </div>
        <!--  -->

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-indigo-50">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-indigo-50">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-indigo-50">
                    {{ __('Mi perfil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault() ;
                                        this.closest('form').submit();" class="text-indigo-50">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>