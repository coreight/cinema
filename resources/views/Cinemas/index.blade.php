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
                        <button class="btn btn-flat btn-sm btn-labeled btn-primary btn-actions">
                            <span class="btn-label icon fa fa-times"></span>Ajouter une séance
                        </button>
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
