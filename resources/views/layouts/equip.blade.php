{{-- resources/views/layouts/equip.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:300,400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Outfit', sans-serif; }
            .glass {
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }
            .dark .glass {
                background: rgba(15, 23, 42, 0.8);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            .animate-fade-in-down {
                animation: fadeInDown 0.5s ease-out;
            }
            @keyframes fadeInDown {
                from { opacity: 0; transform: translateY(-10px); }
                to { opacity: 1; transform: translateY(0); }
            }
        </style>
    </head>
    <body class="h-full antialiased bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100">
        <div class="min-h-screen bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-blue-100 via-slate-50 to-indigo-100 dark:from-slate-900 dark:via-slate-950 dark:to-indigo-950">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header) || View::hasSection('title'))
                <header class="glass sticky top-0 z-30 shadow-sm border-b border-slate-200 dark:border-slate-800">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                        <h2 class="font-bold text-2xl bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400 leading-tight">
                            @if(isset($header))
                                {{ $header }}
                            @else
                                @yield('title')
                            @endif
                        </h2>
                        <div class="flex items-center gap-4">
                            @yield('header_actions')
                        </div>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="py-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    @if (session('success'))
                        <div class="mb-6 animate-fade-in-down">
                            <div class="bg-emerald-50 dark:bg-emerald-900/30 border border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-300 px-4 py-4 rounded-2xl shadow-sm flex items-center gap-3">
                                <div class="bg-emerald-500 text-white p-1 rounded-full">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="font-medium">{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif

                    <div class="glass overflow-hidden shadow-2xl sm:rounded-3xl transition-all duration-500">
                        <div class="p-8 sm:p-10">
                            @yield('content')
                            {{ $slot ?? '' }}
                        </div>
                    </div>
                </div>
            </main>
            
            <footer class="py-10 text-center text-slate-400 dark:text-slate-600 text-sm">
                &copy; {{ date('Y') }} {{ config('app.name') }}. Built with excellence.
            </footer>
        </div>
    </body>
</html>