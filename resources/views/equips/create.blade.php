@extends('layouts.equip')

@section('title', __('Afegir nou equip'))

@section('content')
<div class="max-w-2xl mx-auto">
    <form action="{{ route('equips.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="space-y-2">
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" name="nom" type="text" :value="old('nom')" required autofocus />
            <x-input-error :messages="$errors->get('nom')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="estadi_id" :value="__('Estadi')" />
            <select name="estadi_id" id="estadi_id" class="w-full px-4 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 text-slate-700 dark:text-slate-200 shadow-sm">
                @foreach ($estadis as $estadi)
                    <option value="{{ $estadi->id }}" {{ old('estadi_id') == $estadi->id ? 'selected' : '' }}>
                        {{ $estadi->nom }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('estadi_id')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="titols" :value="__('Títols')" />
            <x-text-input id="titols" name="titols" type="number" :value="old('titols')" required />
            <x-input-error :messages="$errors->get('titols')" />
        </div>

        <div class="flex items-center justify-end gap-4 pt-4">
            <a href="{{ route('equips.index') }}" class="btn btn--ghost">
                {{ __('Cancel·lar') }}
            </a>
            <x-primary-button>
                {{ __('Afegir Equip') }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection