@extends('layout')


@section('title')
    Accueil
@endsection



@section('content')

    <h2 class="title">Accueil</h2>
    <ul>
        <li><a href="{{ route('movies.search') }}/fr/1/3">Les films en français visibles de 3h</a></li>
        <li><a href="{{ route('movies.search') }}/en/0">Les films en anglais non visibles</a></li>
        <li><a href="{{ route('movies.search') }}/fr/1/4">Les films visibles de 4h</a></li>
    </ul>
    <ul>
        <li><a href="{{ route('users.search') }}/69001/Lyon/1">Les utilisateurs actifs de Lyon</a></li>
        <li><a href="{{ route('users.search') }}/69000/*/0">Les utilisateurs inactifs du Rhône</a></li>
        <li><a href="{{ route('users.search') }}/*/*/1">Les utilisateurs actifs</a></li>
    </ul>
@endsection