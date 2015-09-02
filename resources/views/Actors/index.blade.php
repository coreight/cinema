@extends('layout')

@section('title')
    Acteurs
@endsection

@section('header')
    <h2><span class="text-light-gray">Acteurs /</span> index</h2>
@endsection

@section('content')


    <h2>Acteurs</h2>

        <!-- Bouton d'ajout -->
        <button class="btn btn-flat btn-sm btn-labeled btn-success btn-ajout">
            <span class="btn-label icon fa fa-pencil"></span>Ajouter un acteur
        </button>
        <div class="clearfix"></div>

        <!-- Tableau -->
        <div class="table table-light">
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
                @foreach($actors as $actor)
                    <tr>
                        <td>
                            <a href="{{ route('actors.read', ['id' => $actor->id ]) }}" >
                                <img src="{{ $actor->image }}" alt="{{ $actor->firstname }} {{ $actor->lastname }}"></td>
                            </a>
                        <td>
                            <a href="{{ route('actors.read', ['id' => $actor->id ]) }}" >
                                {{ $actor->firstname }} {{ $actor->lastname }}
                            </a>
                        </td>
                        <td> {{ $actor->dob }}</td>
                        <td>
                            <button class="btn btn-flat btn-sm btn-labeled btn-actions">
                                <span class="btn-label icon fa fa-search"></span>Éditer
                            </button>

                            <!-- Bouton de suppression -->
                            <div id="actor-{{ $actor->id }}" class="modal modal-alert modal-danger fade modal-blur">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <i class="fa fa-times-circle"></i>
                                        </div>
                                        <div class="modal-title">Êtes-vous sûr ?</div>
                                        <div class="modal-body">Vous allez supprimer {{ $actor->firstname }} {{ $actor->lastname }}</div>
                                        <div class="modal-footer">
                                            <a href="{{route('actors.delete', ['id' => $actor->id ]) }}" class="btn btn-flat btn-sm btn-labeled btn-danger btn-actions" id="jq-growl-success">
                                                <span class="btn-label icon fa fa-times"></span>Supprimer</a>                                    </div>
                                    </div> <!-- / .modal-content -->
                                </div> <!-- / .modal-dialog -->
                            </div> <!-- / .modal -->
                            <!-- / Danger -->
                            <button class="btn btn-danger btn-flat btn-sm btn-labeled" data-toggle="modal" data-target="#actor-{{ $actor->id }}"><span class="btn-label icon fa fa-times"></span>Supprimer</button>&nbsp;&nbsp;&nbsp;

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


@endsection
