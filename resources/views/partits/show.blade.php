@extends('layouts.equip')

@section('title', __('Detalls del partit'))

@section('content')
    <x-partit
        :local="$partit->local"
        :visitant="$partit->visitant"
        :data="$partit->data"
        :resultat="$partit->resultat"
    />
@endsection
