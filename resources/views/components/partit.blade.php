@props(['local', 'visitant', 'data', 'resultat'])

<article class="card max-w-2xl mx-auto">
    <header class="card__header">
        <h2 class="card__title text-2xl">{{ $local }} vs {{ $visitant }}</h2>
        <span class="card__badge">{{ __('Partit') }}</span>
    </header>

    <div class="card__body space-y-4">
        <div class="flex items-center gap-3 p-4 bg-slate-50 dark:bg-slate-900/50 rounded-2xl">
            <div class="bg-blue-100 dark:bg-blue-900/30 p-2 rounded-xl">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <p class="text-xs text-slate-400 uppercase font-bold tracking-wider m-0">{{ __('Data') }}</p>
                <p class="text-lg font-semibold m-0">{{ $data }}</p>
            </div>
        </div>

        <div class="flex items-center gap-3 p-4 bg-slate-50 dark:bg-slate-900/50 rounded-2xl">
            <div class="bg-emerald-100 dark:bg-emerald-900/30 p-2 rounded-xl">
                <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-xs text-slate-400 uppercase font-bold tracking-wider m-0">{{ __('Resultat') }}</p>
                <p class="text-lg font-semibold m-0 text-emerald-600 dark:text-emerald-400">{{ $resultat ?? __('Pendent') }}</p>
            </div>
        </div>
    </div>

    <footer class="card__footer justify-center">
        <a href="{{ route('partits.index') }}" class="btn btn--ghost">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            {{ __('Tornar al llistat') }}
        </a>
    </footer>
</article>
