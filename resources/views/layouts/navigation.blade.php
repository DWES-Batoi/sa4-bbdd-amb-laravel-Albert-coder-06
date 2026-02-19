<nav x-data="{ open: false }" class="glass border-b border-slate-200 dark:border-slate-800 sticky top-0 z-40">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ auth()->check() ? route('dashboard') : url('/') }}" class="transition-transform hover:scale-105">
                        <x-application-logo class="block h-10 w-auto fill-current text-blue-600 dark:text-blue-400" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('equips.index')" :active="request()->routeIs('equips.*')" class="text-sm font-medium">
                        {{ __('Equips') }}
                    </x-nav-link>

                    <x-nav-link :href="route('estadis.index')" :active="request()->routeIs('estadis.*')" class="text-sm font-medium">
                        {{ __('Estadis') }}
                    </x-nav-link>

                    <x-nav-link :href="route('partits.index')" :active="request()->routeIs('partits.*')" class="text-sm font-medium">
                        {{ __('Partits') }}
                    </x-nav-link>

                    <x-nav-link :href="route('jugadoras.index')" :active="request()->routeIs('jugadoras.*')" class="text-sm font-medium">
                        {{ __('Jugadoras') }}
                    </x-nav-link>

                    <x-nav-link :href="route('classificacio.index')" :active="request()->routeIs('classificacio.*')">
                        {{ __('Classificació') }}
                    </x-nav-link>

                    @auth
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-sm font-medium">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-4">
                <!-- Language Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-slate-200 dark:border-slate-700 text-sm leading-4 font-medium rounded-xl text-slate-600 dark:text-slate-300 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 focus:outline-none transition ease-in-out duration-150 shadow-sm">
                            <div class="flex items-center">
                                <span class="uppercase font-bold">{{ app()->getLocale() }}</span>
                            </div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('setLocale', 'ca')">
                            {{ __('Català') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('setLocale', 'es')">
                            {{ __('Castellano') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('setLocale', 'en')">
                            {{ __('English') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 border border-slate-200 dark:border-slate-700 text-sm leading-4 font-medium rounded-xl text-slate-600 dark:text-slate-300 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 focus:outline-none transition ease-in-out duration-150 shadow-sm">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-2 border-b border-slate-100 dark:border-slate-700">
                                <p class="text-xs text-slate-400 uppercase tracking-wider font-bold">{{ __('Manage Account') }}</p>
                            </div>
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="text-red-600 dark:text-red-400">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition">
                            {{ __('Log in') }}
                        </a>

                        <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-md shadow-blue-200 dark:shadow-none">
                            {{ __('Register') }}
                        </a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-slate-400 dark:text-slate-500 hover:text-slate-500 dark:hover:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-900 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden animate-fade-in-down">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('equips.index')" :active="request()->routeIs('equips.*')" class="rounded-xl">
                {{ __('Equips') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('estadis.index')" :active="request()->routeIs('estadis.*')" class="rounded-xl">
                {{ __('Estadis') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('partits.index')" :active="request()->routeIs('partits.*')" class="rounded-xl">
                {{ __('Partits') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('jugadoras.index')" :active="request()->routeIs('jugadoras.*')" class="rounded-xl">
                {{ __('Jugadoras') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('classificacio.index')" :active="request()->routeIs('classificacio.*')" class="rounded-xl">
                {{ __('Classificació') }}
            </x-responsive-nav-link>

            @auth
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-xl">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @endauth
        </div>

        <div class="pt-2 pb-2 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4 flex items-center gap-4">
                <a href="{{ route('setLocale','ca') }}"
                   class="text-sm text-gray-700 dark:text-gray-300 {{ app()->getLocale()==='ca' ? 'font-bold underline' : '' }}">
                    CA
                </a>
                <a href="{{ route('setLocale','es') }}"
                   class="text-sm text-gray-700 dark:text-gray-300 {{ app()->getLocale()==='es' ? 'font-bold underline' : '' }}">
                    ES
                </a>
                <a href="{{ route('setLocale','en') }}"
                   class="text-sm text-gray-700 dark:text-gray-300 {{ app()->getLocale()==='en' ? 'font-bold underline' : '' }}">
                    EN
                </a>
            </div>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-slate-200 dark:border-slate-800 px-4">
            @auth
                <div class="flex items-center px-4 py-3 bg-slate-50 dark:bg-slate-900 rounded-2xl mb-4">
                    <div class="shrink-0">
                        <div class="h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-600 dark:text-blue-400 font-bold">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                    </div>
                    <div class="ms-3">
                        <div class="font-bold text-base text-slate-800 dark:text-slate-200">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-slate-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" class="rounded-xl">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();" class="rounded-xl text-red-600 dark:text-red-400">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="space-y-1 pb-4">
                    <x-responsive-nav-link :href="route('login')" class="rounded-xl">
                        {{ __('Log in') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('register')" class="rounded-xl">
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                </div>
            @endauth
        </div>
    </div>
</nav>
