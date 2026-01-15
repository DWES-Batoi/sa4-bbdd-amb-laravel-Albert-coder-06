@extends('layouts.equip')

@section('title', "Guia d'Equips")

@section('header_actions')
    <a href="{{ route('equips.create') }}" class="btn btn--primary">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Nou equip
    </a>
@endsection

@section('content')
<div class="grid-cards">
    @foreach ($equips as $equip)
        <article class="card">
            <header class="card__header">
                <h2 class="card__title">{{ $equip->nom }}</h2>
                <span class="card__badge">ID: {{ $equip->id }}</span>
            </header>

            <div class="card__body">
                <p><strong>Estadi:</strong> {{ $equip->estadi?->nom ?? '—' }}</p>
                <p><strong>Títols:</strong> {{ $equip->titols }}</p>
            </div>

            <footer class="card__footer">
                <a class="btn btn--ghost flex-1" href="{{ route('equips.show', $equip) }}">Ver</a>
                <a class="btn btn--ghost flex-1" href="{{ route('equips.edit', $equip) }}">Editar</a>

                <form method="POST" action="{{ route('equips.destroy', $equip) }}" class="inline flex-1">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn--danger w-full" type="submit" onclick="return confirm('Estàs segur?')">Eliminar</button>
                </form>
            </footer>
        </article>
    @endforeach
</div>
@endsection