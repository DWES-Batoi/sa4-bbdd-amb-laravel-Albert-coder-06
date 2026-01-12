@extends('layouts.app')
@section('title', "Guia de Jugadores")

@section('content')
<h1 class="text-3xl font-bold text-blue-800 mb-6">Guia de Jugadores</h1>

@if (session('success'))
  <div class="bg-green-100 text-green-700 p-2 mb-4">{{ session('success') }}</div>
@endif

<p class="mb-4">
  <a href="{{ route('jugadoras.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">
    Nova Jugadora
  </a>
</p>

<table class="w-full border-collapse border border-gray-300">
  <thead class="bg-gray-200">
    <tr>
      <th class="border border-gray-300 p-2">Nom</th>
      <th class="border border-gray-300 p-2">Posició</th>
      <th class="border border-gray-300 p-2">Equip</th>
      <th class="border border-gray-300 p-2">Accions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($jugadoras as $jugadora)
    <tr class="hover:bg-gray-100">
      <td class="border border-gray-300 p-2">
        <a href="{{ route('jugadoras.show', $jugadora->id) }}" class="text-blue-700 hover:underline">
          {{ $jugadora->nom }}
        </a>
      </td>
      <td class="border border-gray-300 p-2">{{ $jugadora->posicio }}</td>
      <td class="border border-gray-300 p-2">{{ $jugadora->equip_rel->nom ?? 'Sense equip' }}</td>
      <td class="border border-gray-300 p-2 text-center">
        <a href="{{ route('jugadoras.edit', $jugadora->id) }}" class="text-yellow-600 hover:underline mr-2">Editar</a>
        <form action="{{ route('jugadoras.destroy', $jugadora->id) }}" method="POST" class="inline">
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
