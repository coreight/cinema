@extends('layout')

@section('title')
    Modification profil
@endsection


@section('content')

@section('header')
    <h2><span class="text-light-gray">Utilisateur /</span> modification</h2>
@endsection


<h2>Modification de votre profil</h2>

<form method="post" action="{{ route('auth.post') }}" class="panel form-horizontal" id="form-validate">
    {!! csrf_field() !!}

    <div class="panel-body">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Nom</label>
            <div class="col-sm-10">

                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" id="name" placeholder="Nom">
                @if ($errors->has('name'))
                    <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>
        </div> <!-- / .form-group -->
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" id="email" placeholder="Email">
                @if ($errors->has('email'))
                    <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                @endif
            </div>
        </div> <!-- / .form-group -->
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Mot de passe</label>
            <div class="col-sm-10">
                <input type="password" name="password"  class="form-control" id="password" placeholder="Mot de passe">
                @if ($errors->has('password'))
                    <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                @endif
            </div>
        </div> <!-- / .form-group -->
        <div class="form-group">
            <label for="password_confirmation" class="col-sm-2 control-label">Confirmation</label>
            <div class="col-sm-10">
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Mot de passe">
                @if ($errors->has('password_confirmation'))
                    <p class="help-block text-danger">{{ $errors->first('password_confirmation') }}</p>
                @endif
            </div>
        </div> <!-- / .form-group -->
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">Prénom</label>
            <div class="col-sm-10">
                <input type="text" name="firstname" value="{{ Auth::user()->firstname }}" class="form-control" id="firstname" placeholder="Prénom">
                @if ($errors->has('firstname'))
                    <p class="help-block text-danger">{{ $errors->first('firstname') }}</p>
                @endif
            </div>
        </div> <!-- / .form-group -->
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <input type="text" name="description" value="{{ Auth::user()->description }}" class="form-control" id="description" placeholder="Description">
                @if ($errors->has('description'))
                    <p class="help-block text-danger">{{ $errors->first('description') }}</p>
                @endif
            </div>
        </div> <!-- / .form-group -->
        <div class="form-group">
            <label for="photo" class="col-sm-2 control-label">Photo</label>
            <div class="col-sm-10">
                <input type="text" name="photo" value="{{ Auth::user()->photo }}" class="form-control" id="photo" placeholder="Photo de profil">
                @if ($errors->has('photo'))
                    <p class="help-block text-danger">{{ $errors->first('photo') }}</p>
                @endif
            </div>
        </div> <!-- / .form-group -->

        <div class="form-group" style="margin-bottom: 0;">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div> <!-- / .form-group -->

@endsection