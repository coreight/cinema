@extends('layout')


@section('content')


    <h2>{{ $directors->firstname }} {{ $directors->lastname }}</h2>

    <img src="{{ $directors->image }}" alt="{{ $directors->firstname }} {{ $directors->lastname }}" class="profil-picture">
    <h3>Biographie</h3>
    <p>{{ str_limit(strip_tags($directors->biography), 2000) }} </p>


@endsection
