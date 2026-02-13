@props(['nom', 'capacitat', 'equips' => collect()])

<article class="card max-w-2xl mx-auto">
    <header class="card__header">
        <h2 class="card__title text-2xl">{{ $nom }}</h2>
        <span class="card__badge">{{ __('Estadi') }}</span>
    </header>

    <div class="card__body space-y-4">
        <div class="flex items-center gap-3 p-4 bg-slate-50 dark:bg-slate-900/50 rounded-2xl">
            <div class="bg-blue-100 dark:bg-blue-900/30 p-2 rounded-xl">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div>
                <p class="text-xs text-slate-400 uppercase font-bold tracking-wider m-0">{{ __('Capacitat') }}</p>
                <p class="text-lg font-semibold m-0">{{ number_format($capacitat, 0, ',', '.') }} {{ __('espectadors') }}</p>
            </div>
        </div>

        <div class="p-4 bg-slate-50 dark:bg-slate-900/50 rounded-2xl">
            <p class="text-xs text-slate-400 uppercase font-bold tracking-wider mb-3">{{ __('Equips que hi juguen') }}</p>
            <div class="flex flex-wrap gap-2">
                @forelse($equips as $equip)
                    <span class="px-3 py-1 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-medium">
                        {{ $equip->nom }}
                    </span>
                @empty
                    <p class="text-sm text-slate-500 italic">{{ __('Cap equip assignat') }}</p>
                @endforelse
            </div>
        </div>
    </div>

    <footer class="card__footer justify-center">
        <a href="{{ route('estadis.index') }}" class="btn btn--ghost">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            {{ __('Tornar al llistat') }}
        </a>
    </footer>
</article>