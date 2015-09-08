@extends('layout')

@section('title')
    Cat&eacute;gories
@endsection

@section('content')

@section('header')
    <h2><span class="text-light-gray">Cat&eacute;gories /</span> index</h2>
@endsection

    <h2>Cat&eacute;gories</h2>

    <!-- Panneau d'information -->
    <div class="col-md-8">
        <div class="stat-panel">
            <!-- Without padding, extra small text -->
            <div class="stat-cell col-xs-7 no-padding valign-middle">
                <!-- Add parent div.stat-rows if you want build nested rows -->
                <div class="stat-rows">
                    <div class="stat-row">
                        <!-- Success background, small padding, vertically aligned text -->
                        <a href="#" class="stat-cell bg-success padding-sm valign-middle">
                             {{ $noMovies[0]->nb_noMovies }} cat&eacute;gories n'ont aucun film enregistré
                            <i class="fa fa-eye-slash pull-right"></i>
                        </a>
                    </div>
                    <div class="stat-row">
                        <!-- Success darken background, small padding, vertically aligned text -->
                        <a href="#" class="stat-cell bg-success darken padding-sm valign-middle">
                             La cat&eacute;gorie <strong>{{ $popular[0]->title }}</strong> est la plus populaire ( {{ $popular[0]->nb_films }} films)
                            <i class="fa fa-star pull-right"></i>
                        </a>
                    </div>
                    <div class="stat-row">
                        <!-- Success darker background, small padding, vertically aligned text -->
                        <a href="#" class="stat-cell bg-success darker padding-sm valign-middle">
                            La cat&eacute;gorie <strong>{{ $bigBudget[0]->title }}</strong> a le plus gros budget de l'ann&eacute;e 2015 ({{ $bigBudget[0]->budget }} &euro;)
                            <i class="fa fa-eur pull-right"></i>
                        </a>
                    </div>
                </div> <!-- /.stat-rows -->
            </div> <!-- /.stat-cell -->
        </div>
    </div>

    <!-- Une cat&eacute;gorie au hasard -->
    <div class="stat-cell bg-danger valign-middle col-md-4">
        <!-- Stat panel bg icon -->
        <i class="fa fa-eur bg-icon"></i>

        <span class="text-sm">AU HASARD</span><br>

        <?php $random = $categories->random() ?>
        <span class="text-xlg"><strong>{{ $random->title }}</strong></span><br>
        <span class="text-bg">{{ count($categories->find($random->id)->movies) }} film(s)</span><br>
        <span class="text-bg">{{ count($categories->find($random->id)->comments) }} commmentaire(s)</span><br>
        <span class="text-bg">{{ count($categories->find($random->id)->actors) }} acteur(s)</span><br>
    </div>


    <!-- Bouton d'ajout -->
    <a href="{{ route('categories.create') }}" class="btn btn-flat btn-sm btn-labeled btn-success btn-ajout">
        <span class="btn-label icon fa fa-pencil"></span>Ajouter une cat&eacute;gorie
    </a>
    <div class="clearfix"></div>

    <!-- Tableau -->
    <div class="table table-light">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
            <thead>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Nb de films</th>
                <th>Actions</th>.

            </tr>
            </thead>
            <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <td><img src="{{ $categorie->image }}" alt="{{ $categorie->title }}"></td>
                    <td>{{ $categorie->title }}</td>
                    <td>{{ $categorie->description }}</td>
                    <td>{{ count($categorie->movies) }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">Actions&nbsp;<i class="fa fa-caret-down"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{{ route('categories.read', ['id' => $categorie->id ]) }}">Voir</a></li>
                                <li><a href="#">Voir films associés</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Editer</a></li>
                                <!-- Bouton de suppression -->
                                <div id="categorie-{{ $categorie->id }}" class="modal modal-alert modal-danger fade modal-blur">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <i class="fa fa-times-circle"></i>
                                            </div>
                                            <div class="modal-title">Êtes-vous sûr ?</div>
                                            <div class="modal-body">Vous allez supprimer "{{ $categorie->title  }}"</div>
                                            <div class="modal-footer">
                                                <a href="{{route('categories.delete', ['id' => $categorie->id ]) }}" class="btn btn-flat btn-sm btn-labeled btn-danger btn-actions" id="jq-growl-success">
                                                    <span class="btn-label icon fa fa-times"></span>Supprimer</a>
                                            </div>
                                        </div> <!-- / .modal-content -->
                                    </div> <!-- / .modal-dialog -->
                                </div> <!-- / .modal -->
                                <li>
                                    <a data-toggle="modal" data-target="#categorie-{{ $categorie->id }}"><span class="btn-label icon fa fa-times"></span>Supprimer</a>&nbsp;&nbsp;&nbsp;
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
