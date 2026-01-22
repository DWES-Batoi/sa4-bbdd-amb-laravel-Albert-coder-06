@props(['nom', 'posicio', 'equip'])

<article class="card max-w-2xl mx-auto">
    <header class="card__header">
        <h2 class="card__title text-2xl">{{ $nom }}</h2>
        <span class="card__badge">{{ __('Jugadora') }}</span>
    </header>

    <div class="card__body space-y-4">
        <div class="flex items-center gap-3 p-4 bg-slate-50 dark:bg-slate-900/50 rounded-2xl">
            <div class="bg-indigo-100 dark:bg-indigo-900/30 p-2 rounded-xl">
                <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
            <div>
                <p class="text-xs text-slate-400 uppercase font-bold tracking-wider m-0">{{ __('Posició') }}</p>
                <p class="text-lg font-semibold m-0">{{ $posicio }}</p>
            </div>
        </div>

        <div class="flex items-center gap-3 p-4 bg-slate-50 dark:bg-slate-900/50 rounded-2xl">
            <div class="bg-blue-100 dark:bg-blue-900/30 p-2 rounded-xl">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <div>
                <p class="text-xs text-slate-400 uppercase font-bold tracking-wider m-0">{{ __('Equip') }}</p>
                <p class="text-lg font-semibold m-0">{{ $equip }}</p>
            </div>
        </div>
    </div>

    <footer class="card__footer justify-center">
        <a href="{{ route('jugadoras.index') }}" class="btn btn--ghost">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            {{ __('Tornar al llistat') }}
        </a>
    </footer>
</article>
