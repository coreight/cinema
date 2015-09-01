@extends('layout')

@section('title')
    FAQ
@endsection

@section('header')
    <h2><span class="text-light-gray">Pages /</span> FAQ</h2>
@endsection

@section('content')


    <h2>Foire aux questions</h2>

    <form action="">
        <label for="sujet">Sujet : <input type="text" name="sujet"></label><br>
        <label for="email">Email : <input type="email" name="email"></label><br>
        <label for="message">Message : <textarea name="message" id="message" cols="30" rows="10"></textarea></label><br>
        <input type="submit">
    </form>


@endsection


