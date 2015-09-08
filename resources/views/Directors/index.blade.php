@extends('layout')


@section('title')
    Réalisateurs
@endsection


@section('content')

    @section('header')
        <h2><span class="text-light-gray">Réalisateurs /</span> index</h2>
    @endsection

    <h2>Réalisateurs</h2>

    <!-- Bouton d'ajout -->
    <a href="{{route('directors.create')}}" class="btn btn-flat btn-sm btn-labeled btn-success btn-ajout">
        <span class="btn-label icon fa fa-pencil"></span>Ajouter un réalisateur
    </a>
    <div class="clearfix"></div>

    <!-- Tableau -->

    <div class="table-light">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
            <thead>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Date de naissance</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>
            @foreach($directors as $director)
                <tr>
                    <td>
                        <a href="{{ route('directors.read', ['id' => $director->id ]) }}" >
                            <img src="{{ $director->image }}" alt="{{ $director->firstname }} {{ $director->lastname }}">
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('directors.read', ['id' => $director->id ]) }}" >
                            {{ $director->firstname }} {{ $director->lastname }}
                        </a>
                    </td>
                    <td> {{ $director->dob }}</td>
                    <td>
                        <button class="btn btn-flat btn-sm btn-labeled btn-actions">
                            <span class="btn-label icon fa fa-search"></span>Éditer
                        </button>

                        <!-- Bouton de suppression -->
                        <div id="director-{{ $director->id }}" class="modal modal-alert modal-danger fade modal-blur">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <i class="fa fa-times-circle"></i>
                                    </div>
                                    <div class="modal-title">Êtes-vous sûr ?</div>
                                    <div class="modal-body">Vous allez supprimer {{ $director->firstname }} {{ $director->lastname }}</div>
                                    <div class="modal-footer">
                                        <a href="{{route('directors.delete', ['id' => $director->id ]) }}" class="btn btn-flat btn-sm btn-labeled btn-danger btn-actions" id="jq-growl-success">
                                            <span class="btn-label icon fa fa-times"></span>Supprimer</a>                                    </div>
                                </div> <!-- / .modal-content -->
                            </div> <!-- / .modal-dialog -->
                        </div> <!-- / .modal -->
                        <!-- / Danger -->
                        <button class="btn btn-danger btn-flat btn-sm btn-labeled" data-toggle="modal" data-target="#director-{{ $director->id }}"><span class="btn-label icon fa fa-times"></span>Supprimer</button>&nbsp;&nbsp;&nbsp;

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
