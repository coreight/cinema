@extends('layout')


@section('content')


    <h2>{{ $actors->firstname }} {{ $actors->lastname }}</h2>

    <img src="{{ $actors->image }}" alt="{{ $actors->firstname }} {{ $actors->lastname }}" class="profil-picture">
    <h3>Biographie</h3>
    <p>{{ str_limit(strip_tags($actors->biography), 2000) }} </p>


@endsection
