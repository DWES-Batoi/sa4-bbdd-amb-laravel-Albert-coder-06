@extends('layouts.equip')

@section('title', __('Editar equip'))

@section('content')
<div class="max-w-2xl mx-auto">
    <form action="{{ route('equips.update', $equip) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="space-y-2">
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" name="nom" type="text" :value="old('nom', $equip->nom)" required autofocus />
            <x-input-error :messages="$errors->get('nom')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="estadi_id" :value="__('Estadi')" />
            <select name="estadi_id" id="estadi_id" class="w-full px-4 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 text-slate-700 dark:text-slate-200 shadow-sm">
                @foreach ($estadis as $estadi)
                    <option value="{{ $estadi->id }}" {{ old('estadi_id', $equip->estadi_id) == $estadi->id ? 'selected' : '' }}>
                        {{ $estadi->nom }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('estadi_id')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="titols" :value="__('Títols')" />
            <x-text-input id="titols" name="titols" type="number" :value="old('titols', $equip->titols)" required />
            <x-input-error :messages="$errors->get('titols')" />
        </div>

        <div class="space-y-2">
            <x-input-label for="escut" :value="__('Escut')" />
            @if($equip->escut)
                <div class="flex items-center gap-4 mb-2">
                    <img src="{{ asset('storage/' . $equip->escut) }}" alt="{{ $equip->nom }}" class="object-contain rounded border border-slate-200" width="100" height="100">
                    <span class="text-sm text-slate-500">{{ __('Escut actual') }}</span>
                </div>
            @endif
            <x-text-input id="escut" name="escut" type="file" />
            <x-input-error :messages="$errors->get('escut')" />
        </div>

        <div class="flex items-center justify-end gap-4 pt-4">
            <a href="{{ route('equips.index') }}" class="btn btn--ghost">
                {{ __('Cancel·lar') }}
            </a>
            <x-primary-button>
                {{ __('Actualitzar Equip') }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection
