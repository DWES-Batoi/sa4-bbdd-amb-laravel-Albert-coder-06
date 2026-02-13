@extends('layouts.equip')

@section('title', __("Guia d'Estadis"))

@section('header_actions')
    <a href="{{ route('estadis.create') }}" class="btn btn--primary">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        {{ __('Nou Estadi') }}
    </a>
@endsection

@section('content')
<div class="grid-cards">
    @foreach ($estadis as $estadi)
        <article class="card">
            <header class="card__header">
                <h2 class="card__title">{{ $estadi->nom }}</h2>
                <span class="card__badge">{{ __('ID') }}: {{ $estadi->id }}</span>
            </header>

            <div class="card__body">
                <p><strong>{{ __('Capacitat') }}:</strong> {{ number_format($estadi->capacitat, 0, ',', '.') }} {{ __('espectadors') }}</p>
                <p><strong>{{ __('Equips') }}:</strong> {{ $estadi->equips->count() }}</p>
            </div>

            <footer class="card__footer">
                <a class="btn btn--ghost flex-1" href="{{ route('estadis.show', $estadi) }}">{{ __('Veure') }}</a>
                <a class="btn btn--ghost flex-1" href="{{ route('estadis.edit', $estadi) }}">{{ __('Editar') }}</a>

                <form method="POST" action="{{ route('estadis.destroy', $estadi) }}" class="inline flex-1">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn--danger w-full" type="submit" onclick="return confirm('{{ __('Estàs segur?') }}')">{{ __('Eliminar') }}</button>
                </form>
            </footer>
        </article>
    @endforeach
</div>
@endsection