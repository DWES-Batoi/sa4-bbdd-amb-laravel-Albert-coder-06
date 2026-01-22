@extends('layouts.equip')

@section('title', __('Afegir nova jugadora'))

@section('content')
<div class="max-w-2xl mx-auto">
    <form action="{{ route('jugadoras.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="space-y-2">
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" name="nom" type="text" :value="old('nom')" required autofocus />
            <x-input-error :messages="$errors->get('nom')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="posicio" :value="__('Posició')" />
            <x-text-input id="posicio" name="posicio" type="text" :value="old('posicio')" required />
            <x-input-error :messages="$errors->get('posicio')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="equip" :value="__('Equip')" />
            <select name="equip" id="equip" class="w-full px-4 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 text-slate-700 dark:text-slate-200 shadow-sm">
                @foreach ($equips as $equip)
                    <option value="{{ $equip->id }}" {{ old('equip') == $equip->id ? 'selected' : '' }}>
                        {{ $equip->nom }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('equip')" />
        </div>

        <div class="flex items-center justify-end gap-4 pt-4">
            <a href="{{ route('jugadoras.index') }}" class="btn btn--ghost">
                {{ __('Cancel·lar') }}
            </a>
            <x-primary-button>
                {{ __('Afegir Jugadora') }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection
