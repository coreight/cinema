@extends('layout')

@section('js')
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    @parent
@endsection

@section('title')
    Accueil
@endsection


@section('content')

    <div class="switch pull-right">
        <a class="btn btn-flat btn-md disabled">Simple</a>
        <a href="{{ route('dashboard2') }}" class="btn btn-flat btn-md">Advance</a>
        <a href="{{ route('dashboard3') }}" class="btn btn-flat btn-md">Pro</a>
    </div>

    <h2 class="title">Accueil</h2>
    <!-- Panneau d'information -->
    <div class="row">
        <div class="col-md-6">
            <div class="stat-panel">
                <a href="#" class="stat-cell col-xs-5 bg-success bordered no-border-vr no-border-l no-padding valign-middle text-center text-lg">
                    Moyenne d'&acirc;ge des acteurs<br><strong>{{ round(array_sum($dob) / count ($dob)) }} ans</strong>
                </a> <!-- /.stat-cell -->
                <!-- Without padding, extra small text -->
                <div class="stat-cell col-xs-7 no-padding valign-middle">
                    <!-- Add parent div.stat-rows if you want build nested rows -->
                    <div class="stat-rows">
                        <div class="stat-row">
                            <!-- Success background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-success padding-sm valign-middle">
                                {{ isset($city['Lyon']) ? $city['Lyon'] : 0 }} &agrave; Lyon
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darken background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-success darken padding-sm valign-middle">
                                {{ isset($city['Paris']) ? $city['Paris'] : 0 }} &agrave; Paris
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darker background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-success darker padding-sm valign-middle">
                                {{ isset($city['Marseille']) ? $city['Marseille'] : 0 }} &agrave; Marseille
                            </a>
                        </div>
                    </div> <!-- /.stat-rows -->
                </div> <!-- /.stat-cell -->
            </div>
        </div>
        <!-- Panneau d'information -->
        <div class="col-md-6">
            <div class="stat-panel">
                <a href="#" class="stat-cell col-xs-5 bg-info bordered no-border-vr no-border-l no-padding valign-middle text-center text-lg">
                    Nombre de commentaires<br><strong>{{ $nbComments }}</strong>
                </a> <!-- /.stat-cell -->
                <!-- Without padding, extra small text -->
                <div class="stat-cell col-xs-7 no-padding valign-middle">
                    <!-- Add parent div.stat-rows if you want build nested rows -->
                    <div class="stat-rows">
                        <div class="stat-row">
                            <!-- Success background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-info padding-sm valign-middle">
                                {{ $nbCommentsActifs }} actifs
                                <i class="fa fa-star pull-right"></i>
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darken background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-info darken padding-sm valign-middle">
                                {{ $nbCommentsValidation }} en cours de validation
                                <i class="fa fa-eye pull-right"></i>
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darker background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-info darker padding-sm valign-middle">
                                {{ $nbCommentsInactifs }} inactifs
                                <i class="fa fa-eye-slash pull-right"></i>
                            </a>
                        </div>
                    </div> <!-- /.stat-rows -->
                </div> <!-- /.stat-cell -->
            </div>
        </div>
    </div>
    <!-- Graphiques -->


    <div class="row">
        <div class="col-md-4">
            <div class="stat-panel text-center">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-pencil"></i>&nbsp;&nbsp;Taux de commentaires actifs
                    </div>
                </div> <!-- /.stat-row -->
                <div class="stat-row">
                    <!-- Bordered, without top border, without horizontal padding -->
                    <div class="stat-cell bordered no-border-t no-padding-hr">
                        <div class="pie-chart" data-percent="{{ $tauxCommentsActifs  }}">
                            <div class="pie-chart-label">{{ $tauxCommentsActifs  }} %</div>
                        </div>
                    </div>
                </div> <!-- /.stat-row -->
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-panel text-center">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-film"></i>&nbsp;&nbsp;Taux de films en favoris
                    </div>
                </div> <!-- /.stat-row -->
                <div class="stat-row">
                    <!-- Bordered, without top border, without horizontal padding -->
                    <div class="stat-cell bordered no-border-t no-padding-hr">
                        <div class="pie-chart" data-percent="{{ $tauxFilmsFavoris  }}">
                            <div class="pie-chart-label">{{ $tauxFilmsFavoris  }} %</div>
                        </div>
                    </div>
                </div> <!-- /.stat-row -->
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-panel text-center">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-film"></i>&nbsp;&nbsp;Taux de films diffus&eacute;s
                    </div>
                </div> <!-- /.stat-row -->
                <div class="stat-row">
                    <!-- Bordered, without top border, without horizontal padding -->
                    <div class="stat-cell bordered no-border-t no-padding-hr">
                        <div class="pie-chart" data-percent="{{ $tauxFilmsVisible  }}">
                            <div class="pie-chart-label">{{ $tauxFilmsVisible  }} %</div>
                        </div>
                    </div>
                </div> <!-- /.stat-row -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="stat-panel">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-globe"></i>&nbsp;&nbsp;Cr&eacute;ation rapide de films
                    </div>
                </div> <!-- /.stat-row -->
                <div class="stat-row">
                <div class="stat-cell padding-sm">
                    <form method="post" action="{{ route('movies.quickPost') }}" class="form-horizontal" id="quickAddMovie">
                    {!! csrf_field() !!}

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
                            <label for="synopsis" class="col-sm-2 control-label">Synopsis</label>
                            <div class="col-sm-10">
                                <textarea id="synopsis" name="synopsis" class="form-control">{{ old('synopsis') }}</textarea>
                                <div id="synopsis-limit-label" class="limiter-label pull-right">Caractères restants : <span class="limiter-count"></span></div>
                                @if ($errors->has('synopsis'))
                                    <p class="help-block text-danger">{{ $errors->first('synopsis') }}</p>
                                @endif
                            </div>
                        </div> <!-- / .form-group -->

                        <div class="form-group">
                            <label for="categories_id" class="col-sm-2 control-label">Cat&eacute;gorie</label>
                            <div class="col-sm-10">
                                <select name="categories_id" value="{{ old('categories_id') }}" class="form-control form-group-margin">
                                    {{-- {{ dump($categories) }}--}}
                                    @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->title }}</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('categories_id'))
                                    <p class="help-block text-danger">{{ $errors->first('categories_id') }}</p>
                                @endif
                            </div>
                        </div> <!-- / .form-group -->

                        <div class="form-group" style="margin-top: 20px;">
                                <button type="submit" class="col-md-offset-2 col-md-4 btn btn-lg btn-primary">Enregistrer</button>
                        </div> <!-- / .form-group -->
                    </form>

                </div>
                </div> <!-- /.stat-row -->
            </div>
        </div>

        <div class="col-md-6">
            <div class="stat-panel widget-support-tickets" id="dashboard-support-tickets">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-globe"></i>&nbsp;&nbsp;Prochaines s&eacute;ances
                        <span class="pull-right">{{ $nbSessions }} s&eacute;ances &agrave; venir</span>
                    </div>
                </div> <!-- /.stat-row -->
                <div class="panel-body tab-content-padding">
                    <div class="panel-padding no-padding-vr">
                        @foreach ($nextSessions as $nextSession)
                            <div class="ticket">

                                <span class="label label-{{ $delaiNextSessions[$nextSession->id]['color'] }} ticket-label">
                                    Sortie dans {{ $delaiNextSessions[$nextSession->id]['delai'] }} jours
                                </span>
                                <a href="#" title="" class="ticket-title">{{ $nextSession->movies->title }}<span>[#{{ $nextSession->movies->id }}]</span></a>
								<span class="ticket-info">
									diffus&eacute; &agrave; <a href="#" title="">{{ $nextSession->cinema->title }}</a>
								</span>
                            </div> <!-- / .ticket -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection


