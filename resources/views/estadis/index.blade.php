@extends('layouts.equip')

@section('title', "Guia d'Estadis")

@section('header_actions')
    <a href="{{ route('estadis.create') }}" class="btn btn--primary">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Nou Estadi
    </a>
@endsection

@section('content')
<div class="grid-cards">
    @foreach ($estadis as $estadi)
        <article class="card">
            <header class="card__header">
                <h2 class="card__title">{{ $estadi->nom }}</h2>
                <span class="card__badge">ID: {{ $estadi->id }}</span>
            </header>

            <div class="card__body">
                <p><strong>Capacitat:</strong> {{ number_format($estadi->capacitat, 0, ',', '.') }} espectadors</p>
                <p><strong>Equips:</strong> {{ $estadi->equips->count() }}</p>
            </div>

            <footer class="card__footer">
                <a class="btn btn--ghost flex-1" href="{{ route('estadis.show', $estadi) }}">Ver</a>
                <a class="btn btn--ghost flex-1" href="{{ route('estadis.edit', $estadi) }}">Editar</a>

                <form method="POST" action="{{ route('estadis.destroy', $estadi) }}" class="inline flex-1">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn--danger w-full" type="submit" onclick="return confirm('Estàs segur?')">Eliminar</button>
                </form>
            </footer>
        </article>
    @endforeach
</div>
@endsection