@extends('layout')

@section('title')
    Cinémas
@endsection

@section('content')

    @section('header')
        <h2><span class="text-light-gray">Cinémas /</span> index</h2>
    @endsection

    <h2>Cinémas</h2>

    <!-- Bouton d'ajout -->
    <button class="btn btn-flat btn-sm btn-labeled btn-success btn-ajout">
        <span class="btn-label icon fa fa-pencil"></span>Ajouter un cinéma
    </button>
    <div class="clearfix"></div>

    <!-- Tableau -->
    <div class="table table-light">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cinemas as $cinema)
                <tr>
                    <td>{{ $cinema->title }}</td>
                    <td> {{ $cinema->ville }}</td>
                    <td class="col-md-2">
                        <button class="btn btn-flat btn-sm btn-labeled btn-actions">
                            <span class="btn-label icon fa fa-search"></span>Éditer
                        </button>

                        <div id="addSession-{{ $cinema->id }}" class="modalAddSession modal modal-alert modal-info modal-blur">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                    <div class="modal-title">Ajouter une séance</div><br>
                                    <div class="modal-body">

                                       {{-- Formulaire d'ajout de séance --}}
                                        <form method="post" action="{{ route('sessions.post') }}" class="form-horizontal" id="addSession">
                                        {!! csrf_field() !!}

                                            <input type="hidden" name="cinema_id" value="{{ $cinema->id }}">

                                            <div class="form-group">
                                                <label for="cinema_title" class="col-sm-2 control-label">Cinema</label>
                                                <div class="col-sm-10">
                                                    <input name="cinema_title"  value="{{ $cinema->title }}" class="form-control form-group-margin" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="movies_id" class="col-sm-2 control-label">Film</label>
                                                <div class="col-sm-10">
                                                    <select name="movies_id"  value="{{ old('movies') }}" class="form-control form-group-margin">

                                                        @foreach ($movies as $movie)
                                                            <option value="{{ $movie->id }}">{{ $movie->title  }}</option>
                                                        @endforeach

                                                    </select>
                                                    @if ($errors->has('movies'))
                                                        <p class="help-block text-danger">{{ $errors->first('movies') }}</p>
                                                    @endif
                                                </div>
                                            </div> <!-- / .form-group -->

                                            <div class="form-group">
                                                <label for="date_session" class="col-sm-2 control-label">Date</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="date_session" value="{{ old('date_session') }}" class="form-control datepicker" id="date_session" placeholder="Date">
                                                    @if ($errors->has('date_session'))
                                                        <p class="help-block text-danger">{{ $errors->first('date_session') }}</p>
                                                    @endif
                                                </div>
                                            </div> <!-- / .form-group -->

                                            <div class="form-group">
                                                <label for="time_session" class="col-sm-2 control-label">Heure</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group date">
                                                        <input type="text" name="time_session" class="form-control" id="timepicker"><span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                    </div>
                                                </div>
                                            </div> <!-- / .form-group -->


                                        <button type="submit" class="btn btn-flat btn-lg btn-labeled btn-primary btn-actions">
                                            <span class="btn-label btn-delete icon fa fa-pencil"></span>Enregistrer</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    </div>

                                    </div> <!-- / .modal-content -->
                            </div> <!-- / .modal-dialog -->
                        </div> <!-- / .modal -->
                        <!-- / Danger -->

                        <a class="btn btn-flat btn-sm btn-labeled btn-primary btn-actions" data-toggle="modal" data-target="#addSession-{{ $cinema->id }}">
                            <span class="btn-label icon fa fa-times"></span>Ajouter une séance
                        </a>
                        <button class="btn btn-flat btn-sm btn-labeled btn-danger btn-actions">
                            <span class="btn-label icon fa fa-times"></span>Supprimer
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
