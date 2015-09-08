@extends('layout')

@section('title')
    Nouvel acteurs
@endsection


@section('content')

    @section('header')
        <h2><span class="text-light-gray">Acteurs /</span> nouveau</h2>
    @endsection


    <h2>Ajout d'un nouvel acteur</h2>

    <form method="post" action="{{ route('actors.post') }}" class="panel form-horizontal" id="form-validate"  enctype="multipart/form-data">
    {!! csrf_field() !!}

        <div class="panel-body">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">Prénom</label>
                <div class="col-sm-10">
                    <input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control" id="firstname" placeholder="Prénom">
                    @if ($errors->has('firstname'))
                        <p class="help-block text-danger">{{ $errors->first('firstname') }}</p>
                    @endif
                </div>
            </div> <!-- / .form-group -->
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">Nom</label>
                <div class="col-sm-10">
                    <input type="text"  name="lastname" value="{{ old('lastname') }}" class="form-control" id="lastname" placeholder="Nom">
                    @if ($errors->has('firstname'))
                        <p class="help-block text-danger">{{ $errors->first('firstname') }}</p>
                    @endif
                </div>
            </div> <!-- / .form-group -->
            <div class="form-group">
                <label for="dob" class="col-sm-2 control-label">Date de naissance</label>
                <div class="col-sm-10">
                    <input type="text" name="dob" value="{{ old('dob') }}" class="form-control datepicker" id="dob" placeholder="Date de naissance">
                    <p class="help-block">Format accepté : YYYY/mm/dd</p>
                    @if ($errors->has('dob'))
                        <p class="help-block text-danger">{{ $errors->first('dob') }}</p>
                    @endif
                </div>
            </div> <!-- / .form-group -->

            <div class="form-group">
                <label for="image" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image"  value="{{ old('image') }}" class="form-control" id="image" accept="image/*" capture="capture">
                    @if ($errors->has('image'))
                        <p class="help-block text-danger">{{ $errors->first('image') }}</p>
                    @endif
                </div>

            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">Nationalité</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="nationality" value="{{ old('nationality') }}" id="optionsRadios1" value="fr" class="px" checked="">
                            <span class="lbl">Français</span>
                        </label>
                    </div> <!-- / .radio -->
                    <div class="radio">
                        <label>
                            <input type="radio" name="nationality" id="optionsRadios2" value="us" class="px">
                            <span class="lbl">Américain</span>
                        </label>
                    </div> <!-- / .radio -->
                    <div class="radio">
                        <label>
                            <input type="radio" name="nationality" id="optionsRadios3" value="en" class="px">
                            <span class="lbl">Anglais</span>
                        </label>
                    </div> <!-- / .radio -->
                    <div class="radio">
                        <label>
                            <input type="radio" name="nationality" id="optionsRadios4" value="es" class="px">
                            <span class="lbl">Espagnol</span>
                        </label>
                    </div> <!-- / .radio -->
                    <div class="radio">
                        <label>
                            <input type="radio" name="nationality" id="optionsRadios5" value="de" class="px">
                            <span class="lbl">Allemand</span>
                        </label>
                    </div> <!-- / .radio -->
                    @if ($errors->has('nationality'))
                        <p class="help-block text-danger">{{ $errors->first('nationality') }}</p>
                    @endif
                </div> <!-- / .col-sm-10 -->
            </div> <!-- / .form-group -->

            <div class="form-group">
                <label for="roles" class="col-sm-2 control-label">Rôles</label>
                <div class="col-sm-10">
                    <select name="roles" value="{{ old('roles') }}" class="form-control form-group-margin">
                        <option>Acteur</option>
                        <option>Réalisateur</option>
                        <option>Producteur</option>
                        <option>Metteur en scène</option>

                    </select>
                    @if ($errors->has('roles'))
                        <p class="help-block text-danger">{{ $errors->first('roles') }}</p>
                    @endif
                </div>
            </div> <!-- / .form-group -->

            <div class="form-group">
                <label for="recompenses" class="col-sm-2 control-label">Récompenses</label>
                <div class="col-sm-10">
                    <input type="text" name="recompenses" value="{{ old('recompenses') }}" class="form-control" id="recompenses" placeholder="Récompenses">
                </div>
                @if ($errors->has('recompenses'))
                    <p class="help-block text-danger">{{ $errors->first('recompenses') }}</p>
                @endif
            </div> <!-- / .form-group -->

            <div class="form-group">
                <label for="biography" class="col-sm-2 control-label">Biographie</label>
                <div class="col-sm-10">
                    <textarea id="summernote" name="biography" class="form-control">{{ old('biography') }}</textarea>
                </div>
                @if ($errors->has('biography'))
                    <p class="help-block text-danger">{{ $errors->first('biography') }}</p>
                @endif
            </div> <!-- / .form-group -->

            <div class="form-group">
                <label for="movies" class="col-sm-2 control-label">Films</label>
                <div class="col-sm-10">
                    <select name="movies[]"  id="multiple" multiple="multiple" value="{{ old('movies') }}" class="form-control form-group-margin">

                        @foreach ($movies as $movie)
                            <option value="{{ $movie->id }}">{{ $movie->title  }}</option>
                        @endforeach

                    </select>
                    @if ($errors->has('movies'))
                        <p class="help-block text-danger">{{ $errors->first('movies') }}</p>
                    @endif
                </div>
            </div> <!-- / .form-group -->

            <div class="form-group" style="margin-bottom: 0;">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </div> <!-- / .form-group -->
        </div>
    </form>

@endsection
