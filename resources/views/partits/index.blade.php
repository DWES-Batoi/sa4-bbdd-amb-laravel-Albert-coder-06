@extends('layouts.app')
@section('title', "Guia de Partits")

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Guia de Partits</h1>

@if (session('success'))
  <div class="bg-green-100 text-green-700 p-2 mb-4">{{ session('success') }}</div>
@endif

<p class="mb-4">
  <a href="{{ route('partits.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">
    Nou Partit
  </a>
</p>

<table class="w-full border-collapse border border-gray-300">
  <thead class="bg-gray-200">
    <tr>
      <th class="border border-gray-300 p-2">Local</th>
      <th class="border border-gray-300 p-2">Visitant</th>
      <th class="border border-gray-300 p-2">Data</th>
      <th class="border border-gray-300 p-2">Resultat</th>
      <th class="border border-gray-300 p-2">Accions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($partits as $partit)
    <tr class="hover:bg-gray-100">
      <td class="border border-gray-300 p-2">
        <a href="{{ route('partits.show', $partit->id) }}" class="text-blue-700 hover:underline">
          {{ $partit->local }}
        </a>
      </td>
      <td class="border border-gray-300 p-2">{{ $partit->visitant }}</td>
      <td class="border border-gray-300 p-2">{{ $partit->data }}</td>
      <td class="border border-gray-300 p-2">{{ $partit->resultat ?? 'Pendent' }}</td>
      <td class="border border-gray-300 p-2 text-center">
        <a href="{{ route('partits.edit', $partit->id) }}" class="text-yellow-600 hover:underline mr-2">Editar</a>
        <form action="{{ route('partits.destroy', $partit->id) }}" method="POST" class="inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Estàs segur?')">Eliminar</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
