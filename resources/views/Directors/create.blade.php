@extends('layout')

@section('title')
    Nouveau réalisateur
@endsection


@section('content')

    @section('header')
        <h2><span class="text-light-gray">Réalisateur /</span> nouveau</h2>
    @endsection


    <h2>Ajout d'un nouveau réalisateur</h2>

    <form method="post" action="{{ route('directors.post') }}" class="panel form-horizontal" enctype="multipart/form-data">
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
                    @if ($errors->has('lastname'))
                        <p class="help-block text-danger">{{ $errors->first('lastname') }}</p>
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
                <label for="note" class="col-sm-2 control-label">Note</label>
                <div class="col-sm-10">
                    <select name="note" class="form-control form-group-margin">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    @if ($errors->has('note'))
                        <p class="help-block text-danger">{{ $errors->first('note') }}</p>
                    @endif
                </div>
            </div> <!-- / .form-group -->

            <div class="form-group">
                <label for="biography" class="col-sm-2 control-label">Biographie</label>
                <div class="col-sm-10">
                    <textarea id="summernote" name="biography" class="form-control">{{ old('biography') }}</textarea>
                    @if ($errors->has('biography'))
                        <p class="help-block text-danger">{{ $errors->first('biography') }}</p>
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
