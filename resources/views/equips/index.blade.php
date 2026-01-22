@extends('layouts.equip')

@section('title', __('Equips'))

@section('header_actions')
    <a href="{{ route('equips.create') }}" class="btn btn--primary">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        {{ __('Nou Equip') }}
    </a>
@endsection

@section('content')
<div class="grid-cards">
    @foreach ($equips as $equip)
        <article class="card">
            <header class="card__header">
                <h2 class="card__title">{{ $equip->nom }}</h2>
                <span class="card__badge">{{ __('ID') }}: {{ $equip->id }}</span>
            </header>

            <div class="card__body">
                <p><strong>{{ __('Ciutat') }}:</strong> {{ $equip->ciutat ?? '—' }}</p>
                <p><strong>{{ __('Estadi') }}:</strong> {{ $equip->estadi->nom ?? '—' }}</p>
            </div>

            <footer class="card__footer">
                <a class="btn btn--ghost flex-1" href="{{ route('equips.show', $equip) }}">{{ __('Veure') }}</a>
                <a class="btn btn--ghost flex-1" href="{{ route('equips.edit', $equip) }}">{{ __('Editar') }}</a>

                <form method="POST" action="{{ route('equips.destroy', $equip) }}" class="inline flex-1" onsubmit="return confirm('{{ __('Segur que vols eliminar aquest equip?') }}');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn--danger w-full" type="submit">{{ __('Eliminar') }}</button>
                </form>
            </footer>
        </article>
    @endforeach
</div>
@endsection