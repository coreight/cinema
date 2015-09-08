@extends('layout')

@section('title')
    Nouvelle catégorie
@endsection


@section('content')

@section('header')
    <h2><span class="text-light-gray">Catégorie/</span> nouvelle</h2>
@endsection


<h2>Ajout d'une nouvelle catégorie</h2>

<form method="post" action="{{ route('categories.post') }}" class="panel form-horizontal" id="form-validate"  enctype="multipart/form-data">
    {!! csrf_field() !!}

    <div class="panel-body">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Titre</label>
            <div class="col-sm-10">
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Titre">
                @if ($errors->has('title'))
                    <p class="help-block text-danger">{{ $errors->first('title') }}</p>
                @endif
            </div>
        </div> <!-- / .form-group -->

        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <input type="text"  name="description" value="{{ old('description') }}" class="form-control" id="description" placeholder="Description">
                @if ($errors->has('description'))
                    <p class="help-block text-danger">{{ $errors->first('description') }}</p>
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


        <div class="form-group" style="margin-bottom: 0;">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div> <!-- / .form-group -->
    </div>
</form>

@endsection
