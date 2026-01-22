@extends('layouts.equip')

@section('title', __('Detalls de la jugadora'))

@section('content')
    <x-jugadora
        :nom="$jugadora->nom"
        :posicio="$jugadora->posicio"
        :equip="$jugadora->equip_rel?->nom ?? __('Sense equip')"
    />
@endsection
