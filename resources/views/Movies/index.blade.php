@extends('layout')

@section('title')
    Films
@endsection

@section('content')

    @section('header')
        <h2><span class="text-light-gray">Films /</span> index</h2>
    @endsection

    <h2>Films</h2>

    <!-- Bouton d'ajout -->
    <button class="btn btn-flat btn-sm btn-labeled btn-success btn-ajout">
        <span class="btn-label icon fa fa-pencil"></span>Ajouter un film
    </button>
    <div class="clearfix"></div>


    <!-- Tableau -->
    <div class="table-light">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
            <thead>
            <tr>
                <th>Image</th>
                <th>Titre</th>
                <th>Année</th>
                <th>Durée</th>
                <th>Visible</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>
                        <a href="{{ route('movies.read', ['id' => $movie->id ]) }}" >
                            <img src="{{ $movie->image }}" alt="{{ $movie->title }}">
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('movies.read', ['id' => $movie->id ]) }}" >
                            {{ $movie->title }}
                        </a>
                    </td>
                    <td>{{ $movie->annee }}</td>
                    <td> {{ $movie->duree }} h</td>
                    <td>
                        <label class="px-single">
                            <input type="checkbox" name="" value="" class="px"><span class="lbl"></span>
                        </label>
                        &nbsp;&nbsp;&nbsp;
                    </td>
                    <td>

                        <button class="btn btn-flat btn-sm btn-labeled btn-actions">
                            <span class="btn-label icon fa fa-search"></span>Éditer
                        </button>


                        <!-- Bouton de suppression -->
                        <div id="movie-{{ $movie->id }}" class="modal modal-alert modal-danger fade modal-blur">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <i class="fa fa-times-circle"></i>
                                    </div>
                                    <div class="modal-title">Êtes-vous sûr ?</div>
                                    <div class="modal-body">Vous allez supprimer "{{ $movie->title  }}"</div>
                                    <div class="modal-footer">
                                        <a href="{{route('movies.delete', ['id' => $movie->id ]) }}" class="btn btn-flat btn-sm btn-labeled btn-danger btn-actions" id="jq-growl-success">
                                            <span class="btn-label icon fa fa-times"></span>Supprimer</a>                                    </div>
                                </div> <!-- / .modal-content -->
                            </div> <!-- / .modal-dialog -->
                        </div> <!-- / .modal -->
                        <!-- / Danger -->
                        <button class="btn btn-danger btn-flat btn-sm btn-labeled" data-toggle="modal" data-target="#movie-{{ $movie->id }}"><span class="btn-label icon fa fa-times"></span>Supprimer</button>&nbsp;&nbsp;&nbsp;

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection
