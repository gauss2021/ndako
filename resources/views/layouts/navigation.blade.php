<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src={{ asset('images/ndako.png') }} alt="logo" />
                    </a>
                </div>

                <!-- Navigation Links -->
                @auth
                    <div class="hidden space-x-8 lg:-my-px lg:ml-10 lg:flex">
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('Acceuil') }}
                        </x-nav-link>
                        <x-nav-link href="./#tendances ">
                            {{ __('Tendances') }}
                        </x-nav-link>
                        <x-nav-link href="./#maisons">
                            {{ __('Maisons') }}
                        </x-nav-link>
                        <x-nav-link href="#">
                            {{ __('Messages') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.contact')" :active="request()->routeIs('admin.contact')">
                            {{ __('Nous contacter') }}
                        </x-nav-link>
                    </div>
                @endauth

                <!-- liens quand le users n'est pas connecte -->
                @guest
                    <div class="hidden space-x-8 lg:-my-px lg:ml-10 lg:flex">
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('Acceuil') }}
                        </x-nav-link>
                        <x-nav-link href='./#tendances'>
                            {{ __('Tendances') }}
                        </x-nav-link>
                        <x-nav-link href='./#maisons'>
                            {{ __('Maisons') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.contact')" :active="request()->routeIs('admin.contact')">
                            {{ __('Nous contacter') }}
                        </x-nav-link>
                    </div>
                @endguest
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden lg:flex lg:items-center lg:ml-6">
                {{-- connecte --}}
                @auth
                    <x-nav-link :href="route('house.index')" :active="request()->routeIs('house.index')" class="mr-4">
                        {{ __('Vos locations') }}
                    </x-nav-link>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->firstname }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="flex items-center">
                                <svg class="text-left text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out"
                                    style="width: 30px; height: 20%" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <x-responsive-nav-link :href="route('profile.edit')" style="width: 80%">
                                    {{ __('Mon profile') }}
                                </x-responsive-nav-link>
                            </div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="text-left text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        style="height: 30px; width: 20%">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                        style="width: 80%">
                                        {{ __('Se deconnecter') }}
                                    </x-responsive-nav-link>
                                </div>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

                {{-- non connecte --}}
                @guest
                    <div class="flex justify-between navButtonWidth">
                        <x-dropdown-link :href="route('login')"
                            class="bg-orange-600 hover:bg-orange-700 focus:bg-orange-700 border lg:rounded-md lg:w-32 text-white">
                            {{ __('se connecter') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('register')"
                            class="bg-indigo-600 hover:bg-indigo-700 focus:bg-indigo-700 border lg:rounded-md lg:w-32 text-white">
                            {{ __('s\'enregistrer') }}
                        </x-dropdown-link>
                    </div>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center lg:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden lg:hidden">
        <div class="pt-2 pb-3 flex flex-col space-y-2">
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Acceuil') }}
            </x-nav-link>
            <x-nav-link href='./#tendances'>
                {{ __('Tendances') }}
            </x-nav-link>
            <x-nav-link href='./#maisons'>
                {{ __('Maisons') }}
            </x-nav-link>
            <x-nav-link :href="route('admin.contact')" :active="request()->routeIs('admin.contact')">
                {{ __('Nous contacter') }}
            </x-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @auth

            <div class="pt-4 pb-1 border-t border-gray-200">
                <x-nav-link :href="route('house.index')" :active="request()->routeIs('house.index')" class="mr-4">
                    {{ __('Vos locations') }}
                </x-nav-link>
            </div>

            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 text-center">{{ Auth::user()->firstname }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <div class="flex items-center">
                        <svg class="me-3 text-left text-sm lg:text-base lg:font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out"
                            style="width: 10%; height: 30px" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <x-responsive-nav-link :href="route('profile.edit')" class="text-sm" style="width: 90%" :active="request()->routeIs('profile.edit')">
                            {{ __('Mon profile') }}
                        </x-responsive-nav-link>
                    </div>


                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="text-left text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                style="height: 30px; width: 10%">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                style="width: 90%">
                                {{ __('Se deconnecter') }}
                            </x-responsive-nav-link>
                        </div>

                    </form>
                </div>
            </div>
        @endauth

        @guest
            <div class="pt-2 pb-1 border-t border-gray-200">
                <div class="mt-1 space-y-1">
                    <x-responsive-nav-link :href="route('login')"
                        class="bg-orange-600 hover:bg-orange-700 border lg:rounded-md w-40 mx-auto text-center text-white mb-3">
                        {{ __('Se connecter') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')"
                        class="bg-indigo-600 hover:bg-indigo-700 border lg:rounded-md w-40 mx-auto text-center text-white">
                        {{ __('S\'enregistrer') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        @endguest
    </div>
</nav>


<style>
    @media only screen and (min-width: 768px) {

        /* For desktop: */
        .navButtonWidth {
            width: 300px !important;
        }
    }
</style>
