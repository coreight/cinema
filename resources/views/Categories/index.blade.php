@extends('layout')

@section('title')
    Catégories
@endsection

@section('content')

@section('header')
    <h2><span class="text-light-gray">Catégories /</span> index</h2>
@endsection

    <h2>Catégories</h2>

    <!-- Bouton d'ajout -->
    <button class="btn btn-flat btn-sm btn-labeled btn-success btn-ajout">
        <span class="btn-label icon fa fa-pencil"></span>Ajouter une catégorie
    </button>
    <div class="clearfix"></div>

    <!-- Tableau -->
    <div class="table table-light">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
            <thead>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <td><img src="{{ $categorie->image }}" alt="{{ $categorie->title }}"></td>
                    <td>{{ $categorie->title }}</td>
                    <td>{{ $categorie->description }}</td>
                    <td>
                        <button class="btn btn-flat btn-sm btn-labeled btn-actions">
                            <span class="btn-label icon fa fa-search"></span>Éditer
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
