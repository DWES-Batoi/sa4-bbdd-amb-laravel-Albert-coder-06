@extends('layouts.app')
@section('title', 'Detalls de la jugadora')

@section('content')
<h1 class="text-2xl font-bold mb-4">Detalls de la jugadora</h1>

<div class="bg-white p-6 rounded shadow">
  <p><strong>Nom:</strong> {{ $jugadora->nom }}</p>
  <p><strong>Posició:</strong> {{ $jugadora->posicio }}</p>
  <p><strong>Equip:</strong> {{ $jugadora->equip_rel->nom ?? 'Sense equip' }}</p>
</div>

<p class="mt-4">
  <a href="{{ route('jugadoras.index') }}" class="text-blue-600 hover:underline">Tornar al llistat</a>
</p>
@endsection
