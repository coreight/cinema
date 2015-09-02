@extends('layout')


@section('content')


    <h2>{{ $movies->title }}</h2>

    <img src="{{ $movies->image }}" alt="{{ $movies->title }}" class="profil-picture">
    <h3>Synopsis</h3>
    <p>{{ str_limit(strip_tags($movies->synopsis), 2000) }} </p>


@endsection
