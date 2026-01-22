@extends('layouts.equip')

@section('title', __('Editar estadi'))

@section('content')
<div class="max-w-2xl mx-auto">
    <form action="{{ route('estadis.update', $estadi) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="space-y-2">
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" name="nom" type="text" :value="old('nom', $estadi->nom)" required autofocus />
            <x-input-error :messages="$errors->get('nom')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="capacitat" :value="__('Capacitat')" />
            <x-text-input id="capacitat" name="capacitat" type="number" :value="old('capacitat', $estadi->capacitat)" required />
            <x-input-error :messages="$errors->get('capacitat')" />
        </div>

        <div class="flex items-center justify-end gap-4 pt-4">
            <a href="{{ route('estadis.index') }}" class="btn btn--ghost">
                {{ __('Cancel·lar') }}
            </a>
            <x-primary-button>
                {{ __('Actualitzar Estadi') }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection
