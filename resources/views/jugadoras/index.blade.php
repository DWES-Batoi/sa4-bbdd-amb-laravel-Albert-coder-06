@extends('layouts.equip')

@section('title', "Guia de Jugadores")

@section('header_actions')
    <a href="{{ route('jugadoras.create') }}" class="btn btn--primary">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Nova Jugadora
    </a>
@endsection

@section('content')
<div class="grid-cards">
    @foreach ($jugadoras as $jugadora)
        <article class="card">
            <header class="card__header">
                <h2 class="card__title">{{ $jugadora->nom }}</h2>
                <span class="card__badge">ID: {{ $jugadora->id }}</span>
            </header>

            <div class="card__body">
                <p><strong>Posició:</strong> {{ $jugadora->posicio }}</p>
                <p><strong>Equip:</strong> {{ $jugadora->equip_rel?->nom ?? 'Sin equipo' }}</p>
            </div>

            <footer class="card__footer">
                <a class="btn btn--ghost flex-1" href="{{ route('jugadoras.show', $jugadora) }}">Ver</a>
                <a class="btn btn--ghost flex-1" href="{{ route('jugadoras.edit', $jugadora) }}">Editar</a>

                <form method="POST" action="{{ route('jugadoras.destroy', $jugadora) }}" class="inline flex-1">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn--danger w-full" type="submit" onclick="return confirm('Estàs segur?')">Eliminar</button>
                </form>
            </footer>
        </article>
    @endforeach
</div>
@endsection
