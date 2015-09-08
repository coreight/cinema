@extends('layout')

@section('title')
    Films
@endsection

@section('content')

    @section('header')
        <h2><span class="text-light-gray">Films /</span> index</h2>
    @endsection

    <h2>Films</h2>


    <!-- Panneau d'information -->
    <div class="col-md-8">
        <div class="stat-panel">
            <a href="#" class="stat-cell col-xs-5 bg-success bordered no-border-vr no-border-l no-padding valign-middle text-center text-lg">
                <i class="fa fa-film"></i>&nbsp;&nbsp;<strong>{{ $nbTotal }} films</strong>
            </a> <!-- /.stat-cell -->
            <!-- Without padding, extra small text -->
            <div class="stat-cell col-xs-7 no-padding valign-middle">
                <!-- Add parent div.stat-rows if you want build nested rows -->
                <div class="stat-rows">
                    <div class="stat-row">
                        <!-- Success background, small padding, vertically aligned text -->
                        <a href="#" class="stat-cell bg-success padding-sm valign-middle">
                            {{ $enAvant }} films en avant
                            <i class="fa fa-star pull-right"></i>
                        </a>
                    </div>
                    <div class="stat-row">
                        <!-- Success darken background, small padding, vertically aligned text -->
                        <a href="#" class="stat-cell bg-success darken padding-sm valign-middle">
                            {{ $aVenir }} films à venir
                            <i class="fa fa-eye pull-right"></i>
                        </a>
                    </div>
                    <div class="stat-row">
                        <!-- Success darker background, small padding, vertically aligned text -->
                        <a href="#" class="stat-cell bg-success darker padding-sm valign-middle">
                            {{ $invisible }} films inactifs
                            <i class="fa fa-eye-slash pull-right"></i>
                        </a>
                    </div>
                </div> <!-- /.stat-rows -->
            </div> <!-- /.stat-cell -->
        </div>
    </div>

    <div class="stat-cell bg-danger valign-middle col-md-4">
        <!-- Stat panel bg icon -->
        <i class="fa fa-eur bg-icon"></i>
        <!-- Extra large text -->
        <span class="text-xlg"><strong>{{ number_format($budgetTotal, 0, ',', ' ') }} &euro;</strong></span><br>
        <!-- Big text -->
        <span class="text-bg">Budget total</span><br>
        <!-- Small text -->
        <span class="text-sm">Des films de 2015</span>
    </div>


    <!-- Boutons de filtres -->
    <form method="get" action="{{ route('movies.index') }}" class="form-horizontal" id="filter-buttons">

        <strong>BO :</strong>
        <div class="btn-group" id="radio-group" data-toggle="buttons">
            <label class="btn btn-outline">
                <input type="radio" name="boAll[]" value="tous" checked> Tous
            </label>
            <label class="btn btn-outline">
                <input type="radio" name="boAll[]" value="filtrer"> Filtrer >
            </label>
        </div>

        <div class="btn-group hide" data-toggle="buttons" id="bo">
            <label class="btn btn-outline">
                <input type="checkbox" name="bo[]" value="vf"> VF
            </label>
            <label class="btn btn-outline">
                <input type="checkbox" name="bo[]" value="vostfr"> VOSTFR
            </label>
            <label class="btn btn-outline">
                <input type="checkbox" name="bo[]" value="vost"> VOST
            </label>
            <label class="btn btn-outline">
                <input type="checkbox" name="bo[]" value="vo"> VO
            </label>
        </div>

        <div class="btn-group col-md-offset-1" data-toggle="buttons">
            <label class="btn btn-outline">
                <input type="radio" name="visibility[]" value="1"> Visible
            </label>
            <label class="btn btn-outline">
                <input type="radio" name="visibility[]" value="0"> Invisible
            </label>
        </div>

        <div class="btn-group col-md-offset-1" data-toggle="buttons">
            <label class="btn btn-outline">
                <input type="radio" name="distributeur[]" value="Warner_Bros"> Warner Bros
            </label>
            <label class="btn btn-outline">
                <input type="radio" name="distributeur[]" value="HBO"> HBO
            </label>
        </div>


        <button type="submit" class="btn btn-primary">Filtrer</button>
    </form>

    <form method="get" action="MoviesController@delete" class="form-inline" id="form-tableau">


        <!-- Bouton de modifications globales -->
        <select class="form-control form-group-margin">
            <option>Supprimer</option>
            <option>Visible</option>
            <option>Invisible</option>
        </select>

        <div id="modal-action" class="modal modal-alert modal-danger fade modal-blur">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="fa fa-times-circle"></i>
                    </div>
                    <div class="modal-title">Êtes-vous sûr ?</div>
                    <div class="modal-body">Vous allez supprimer un ou plusieurs films</div>
                    <div class="modal-footer">
                        <a href="{{route('movies.delete') }}" class="btn btn-flat btn-sm btn-labeled btn-danger btn-actions" id="jq-growl-success">
                            <span class="btn-label icon fa fa-times"></span>Supprimer</a>
                    </div>
                </div> <!-- / .modal-content -->
            </div> <!-- / .modal-dialog -->
        </div> <!-- / .modal -->
        <a class="btn btn-flat btn-sm" id="tableau-submit" data-toggle="modal" data-target="#modal-action">
            <span class="btn-label icon fa fa-chevron-right"></span></a>
        <input type="submit" class="btn btn-flat btn-sm btn-danger" value="Supprimer">


        <!-- Bouton d'ajout -->
        <a href="{{ route('movies.create') }}" class="btn btn-flat btn-sm btn-labeled btn-success btn-ajout">
            <span class="btn-label icon fa fa-pencil"></span>Ajouter un film
        </a>
        <div class="clearfix"></div>


        <!-- Tableau -->
        <div class="table-light">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Année</th>
                    <th>Durée</th>
                    <th>BO</th>
                    <th>Visible</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($movies as $movie)
                    <tr id="id">
                        <td>
                            <input type="checkbox" name="id" value="id-{{ $movie->id }}">
                            {{ $movie->id }}
                        </td>
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
                        <td> {{ $movie->bo }}</td>
                        <td id="visible" data-id="{{ $movie->id  }}">

                        {!! Form::checkbox('active', $movie->id, $movie->visible,  ['id' => $movie->id]) !!}
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
                                                <span class="btn-label icon fa fa-times"></span>Supprimer</a>
                                        </div>
                                    </div> <!-- / .modal-content -->
                                </div> <!-- / .modal-dialog -->
                            </div> <!-- / .modal -->
                            <!-- / Danger -->
                            <a class="btn btn-danger btn-flat btn-sm btn-labeled" data-toggle="modal" data-target="#movie-{{ $movie->id }}"><span class="btn-label icon fa fa-times"></span>Supprimer</a>&nbsp;&nbsp;&nbsp;

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </form>



@endsection
