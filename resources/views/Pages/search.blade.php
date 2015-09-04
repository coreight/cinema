@extends('layout')

@section('title')
    Recherche
@endsection


@section('content')


    @section('header')
        <h2><span class="text-light-gray">Pages /</span> recherche</h2>
    @endsection



<form method="get" action="{{ route('search') }}" class="panel form-horizontal col-sm-8">
    <div class="panel-heading">
        <span class="panel-title">Recherche</span>
    </div>
    <div class="panel-body  text-right">
        <div class="row form-group">
            <label class="col-sm-2 control-label">Titre :</label>
            <div class="col-sm-8">
                <input type="text" name="title" id="title" class="form-control">
            </div>
        </div>

        <label class="col-sm-2 control-label">Langue :</label>
        <div class="row form-group col-sm-2">

            <select class="form-control" id="lang" name="lang">
                <option>FR</option>
                <option>EN</option>
            </select>
        </div>

        <p>
            <label class="checkbox-inline">
                <input type="checkbox" class="px" name="test[]" value="one">
                <span class="lbl">One</span>
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" class="px"  name="test[]" value="two" checked="checked">
                <span class="lbl">Two</span>
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" class="px"  name="test[]" value="three">
                <span class="lbl">Three</span>
            </label>
        </p>
    </div>


    <div class="panel-footer text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>


@endsection
