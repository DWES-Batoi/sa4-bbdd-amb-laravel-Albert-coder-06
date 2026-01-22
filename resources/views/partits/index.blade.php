@extends('layouts.equip')

@section('title', __("Guia de Partits"))

@section('header_actions')
    <a href="{{ route('partits.create') }}" class="btn btn--primary">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        {{ __('Nou Partit') }}
    </a>
@endsection

@section('content')
<div class="grid-cards">
    @foreach ($partits as $partit)
        <article class="card">
            <header class="card__header">
                <h2 class="card__title">{{ $partit->local ?? '—' }} vs {{ $partit->visitant ?? '—' }}</h2>
                <span class="card__badge">{{ __('ID') }}: {{ $partit->id }}</span>
            </header>

            <div class="card__body">
                <p><strong>{{ __('Data') }}:</strong> {{ $partit->data ?? '—' }}</p>
                <p><strong>{{ __('Resultat') }}:</strong> <span class="font-bold text-blue-600">{{ $partit->resultat ?? __('Pendent') }}</span></p>
            </div>

            <footer class="card__footer">
                <a class="btn btn--ghost flex-1" href="{{ route('partits.show', $partit) }}">{{ __('Veure') }}</a>
                <a class="btn btn--ghost flex-1" href="{{ route('partits.edit', $partit) }}">{{ __('Editar') }}</a>

                <form method="POST" action="{{ route('partits.destroy', $partit) }}" class="inline flex-1">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn--danger w-full" type="submit" onclick="return confirm('{{ __('Estàs segur?') }}')">{{ __('Eliminar') }}</button>
                </form>
            </footer>
        </article>
    @endforeach
</div>
@endsection
