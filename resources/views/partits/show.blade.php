@extends('layouts.equip')
@section('title', 'Detalls del partit')

@section('content')
<h1 class="text-2xl font-bold mb-4">Detalls del partit</h1>

<div class="bg-white p-6 rounded shadow">
  <p><strong>Local:</strong> {{ $partit->local }}</p>
  <p><strong>Visitant:</strong> {{ $partit->visitant }}</p>
  <p><strong>Data:</strong> {{ $partit->data }}</p>
  <p><strong>Resultat:</strong> {{ $partit->resultat ?? 'Pendent' }}</p>
</div>

<p class="mt-4">
  <a href="{{ route('partits.index') }}" class="text-blue-600 hover:underline">Tornar al llistat</a>
</p>
@endsection
