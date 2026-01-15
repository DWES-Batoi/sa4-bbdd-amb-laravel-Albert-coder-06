@extends('layouts.equip')
@section('title', 'Editar partit')

@section('content')
<h1 class="text-2xl font-bold mb-4">Editar partit</h1>

@if ($errors->any())
  <div class="bg-red-100 text-red-700 p-2 mb-4">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('partits.update', $partit->id) }}" method="POST" class="space-y-4">
  @csrf
  @method('PUT')
  <div>
    <label for="local" class="block font-bold">Local:</label>
    <input
      type="text"
      name="local"
      id="local"
      value="{{ old('local', $partit->local) }}"
      class="border p-2 w-full"
    >
  </div>

  <div>
    <label for="visitant" class="block font-bold">Visitant:</label>
    <input
      type="text"
      name="visitant"
      id="visitant"
      value="{{ old('visitant', $partit->visitant) }}"
      class="border p-2 w-full"
    >
  </div>

  <div>
    <label for="data" class="block font-bold">Data:</label>
    <input
      type="date"
      name="data"
      id="data"
      value="{{ old('data', $partit->data) }}"
      class="border p-2 w-full"
    >
  </div>

  <div>
    <label for="resultat" class="block font-bold">Resultat:</label>
    <input
      type="text"
      name="resultat"
      id="resultat"
      value="{{ old('resultat', $partit->resultat) }}"
      class="border p-2 w-full"
    >
  </div>

  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
    Actualitzar
  </button>
</form>
@endsection
