@extends('layouts.equip')

@section('title', __('Editar partit'))

@section('content')
<div class="max-w-2xl mx-auto">
    <form action="{{ route('partits.update', $partit) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="space-y-2">
            <x-input-label for="local" :value="__('Local')" />
            <x-text-input id="local" name="local" type="text" :value="old('local', $partit->local)" required autofocus />
            <x-input-error :messages="$errors->get('local')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="visitant" :value="__('Visitant')" />
            <x-text-input id="visitant" name="visitant" type="text" :value="old('visitant', $partit->visitant)" required />
            <x-input-error :messages="$errors->get('visitant')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="data" :value="__('Data')" />
            <x-text-input id="data" name="data" type="date" :value="old('data', $partit->data)" required />
            <x-input-error :messages="$errors->get('data')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="estadi_id" :value="__('Estadi')" />
            <x-text-input id="estadi_id" name="estadi_id" type="text" :value="old('estadi_id', $estadiNom)" required />
            <x-input-error :messages="$errors->get('estadi_id')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="jornada" :value="__('Jornada')" />
            <x-text-input id="jornada" name="jornada" type="text" :value="old('jornada', $partit->jornada)" required />
            <x-input-error :messages="$errors->get('jornada')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="gols_local" :value="__('Gols Local')" />
            <x-text-input id="gols_local" name="gols_local" type="text" :value="old('gols_local', $partit->gols_local)" required />
            <x-input-error :messages="$errors->get('gols_local')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="gols_visitant" :value="__('Gols Visitant')" />
            <x-text-input id="gols_visitant" name="gols_visitant" type="text" :value="old('gols_visitant', $partit->gols_visitant)" required />
            <x-input-error :messages="$errors->get('gols_visitant')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="resultat" :value="__('Resultat')" />
            <x-text-input id="resultat" name="resultat" type="text" :value="old('resultat', $partit->resultat)" placeholder="Ex: 2-1" />
            <x-input-error :messages="$errors->get('resultat')" />
        </div>

        <div class="flex items-center justify-end gap-4 pt-4">
            <a href="{{ route('partits.index') }}" class="btn btn--ghost">
                {{ __('Cancel·lar') }}
            </a>
            <x-primary-button>
                {{ __('Actualitzar Partit') }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection
