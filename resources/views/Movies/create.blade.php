@extends('layout')

@section('title')
    Nouveau film
@endsection


@section('content')

@section('header')
    <h2><span class="text-light-gray">Film /</span> nouveau</h2>
@endsection

<h2>Ajout d'un nouveau film</h2>

<form method="post" action="{{ route('movies.post') }}" class="panel form-horizontal" id="form-validate"  enctype="multipart/form-data">
    {!! csrf_field() !!}

    <div class="panel-body">
        <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
            <li class="active">
                <a href="#tab-identite" data-toggle="tab">Identité</a>
            </li>
            <li class="">
                <a href="#tab-complement" data-toggle="tab">Compléments</a>
            </li>
            <li class="">
                <a href="#tab-medias" data-toggle="tab">Médias</a>
            </li>
            <li class="">
                <a href="#tab-liens" data-toggle="tab">Liens</a>
            </li>
        </ul>
        <div class="tab-content tab-content-bordered">


            <!-- IDENTITE -->
            <div class="tab-pane fade active in" id="tab-identite">

                <div class="form-group">
                    <label for="type" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                        <select name="type" class="form-control form-group-margin">
                            <option>Long-métrage</option>
                            <option>Court-métrage</option>
                        </select>
                        @if ($errors->has('type'))
                            <p class="help-block text-danger">{{ $errors->first('type') }}</p>
                        @endif
                    </div>
                </div> <!-- / .form-group -->

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
                        <div id="synopsis-limit-label" class="limiter-label">Caractères restants : <span class="limiter-count"></span></div>
                    @if ($errors->has('synopsis'))
                            <p class="help-block text-danger">{{ $errors->first('synopsis') }}</p>
                        @endif
                    </div>
                </div> <!-- / .form-group -->


                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea id="summernote" name="description" class="form-control">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <p class="help-block text-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                </div> <!-- / .form-group -->
            </div>

            <!-- COMPLEMENTS -->
            <div class="tab-pane fade" id="tab-complement">
                <div class="form-group">
                    <label for="lang" class="col-sm-2 control-label">Langue</label>
                    <div class="col-sm-10">
                        <select name="lang" value="{{ old('lang') }}" class="form-control form-group-margin">
                            <option>fr</option>
                            <option>en</option>
                            <option>en_US</option>
                        </select>
                        @if ($errors->has('lang'))
                            <p class="help-block text-danger">{{ $errors->first('lang') }}</p>
                        @endif
                    </div>
                </div> <!-- / .form-group -->

                <div class="form-group">
                    <label for="distributeur" class="col-sm-2 control-label">Distributeur</label>
                    <div class="col-sm-10">
                        <select name="distributeur" value="{{ old('distributeur') }}" class="form-control form-group-margin">
                            <option>Warner Bros</option>
                            <option>HBO</option>
                            <option>Netflix</option>
                        </select>
                        @if ($errors->has('distributeur'))
                            <p class="help-block text-danger">{{ $errors->first('distributeur') }}</p>
                        @endif
                    </div>
                </div> <!-- / .form-group -->

                <div class="form-group">
                    <label for="bo" class="col-sm-2 control-label">Bande originale</label>
                    <div class="col-sm-10">
                        <select name="bo" value="{{ old('bo') }}" class="form-control form-group-margin">
                            <option>VF</option>
                            <option>VOSTFR</option>
                            <option>VOST</option>
                            <option>VO</option>
                        </select>
                        @if ($errors->has('bo'))
                            <p class="help-block text-danger">{{ $errors->first('bo') }}</p>
                        @endif
                    </div>
                </div> <!-- / .form-group -->

                <div class="form-group">
                    <label for="duree" class="col-sm-2 control-label">Durée (h)</label>
                    <div class="col-sm-3">
                        <div id="duree-slider" class="ui-slider"></div>
                        <input type="text" name="duree" value="{{ old('duree') }}" class="form-control" id="duree">
                        @if ($errors->has('duree'))
                            <p class="help-block text-danger">{{ $errors->first('duree') }}</p>
                        @endif

                    </div>
                </div> <!-- / .form-group -->

                <div class="form-group">
                    <label for="budget" class="col-sm-2 control-label">Budget (€)</label>
                    <div class="col-sm-3">
                        <div id="budget-slider" class="ui-slider"></div>
                        <input type="text" name="budget" value="{{ old('budget') }}" class="form-control" id="budget">
                        @if ($errors->has('budget'))
                            <p class="help-block text-danger">{{ $errors->first('budget') }}</p>
                        @endif
                    </div>
                </div> <!-- / .form-group -->

                <div class="form-group">
                    <label for="annee" class="col-sm-2 control-label">Année</label>
                    <div class="col-sm-2">
                        <input type="text" name="annee" value="{{ old('annee') }}" class="form-control" id="annee" placeholder="Année">
                        <p class="help-block">Format accepté : YYYY</p>
                        @if ($errors->has('annee'))
                            <p class="help-block text-danger">{{ $errors->first('annee') }}</p>
                        @endif
                    </div>
                </div> <!-- / .form-group -->

                <div class="form-group">
                    <label for="date_release" class="col-sm-2 control-label">Date de sortie</label>
                    <div class="col-sm-10">
                        <input type="text" name="date_release" value="{{ old('date_release') }}" class="form-control datepicker" id="date_release" placeholder="Date de sortie">
                        <p class="help-block">Format accepté : YYYY/mm/dd</p>
                        @if ($errors->has('date_release'))
                            <p class="help-block text-danger">{{ $errors->first('date_release') }}</p>
                        @endif
                    </div>
                </div> <!-- / .form-group -->

                <div class="form-group">
                    <label for="note_presse" class="col-sm-2 control-label">Note de la presse</label>
                    <div class="col-sm-10">
                        <select name="note_presse" class="form-control form-group-margin">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        @if ($errors->has('note_presse'))
                            <p class="help-block text-danger">{{ $errors->first('note_presse') }}</p>
                        @endif
                    </div>
                </div> <!-- / .form-group -->

                <div class="form-group">
                    <label for="visible" class="col-sm-2 control-label">Visible</label>
                    <div class="col-sm-10">
                        <input class="switcher" name="visible" type="checkbox" data-class="switcher-primary" checked="checked">&nbsp;&nbsp;
                    </div>
                </div>


                <div class="form-group">
                    <label for="cover" class="col-sm-2 control-label">A l'affiche</label>
                    <div class="col-sm-10">
                        <input class="switcher" name="cover" type="checkbox" data-class="switcher-primary" checked="checked">&nbsp;&nbsp;
                    </div>
                </div>
            </div>

            <!-- MEDIAS -->
            <div class="tab-pane fade" id="tab-medias">
                <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="image"  value="{{ old('image') }}" class="form-control" id="image" accept="image/*" capture="capture">
                        @if ($errors->has('image'))
                            <p class="help-block text-danger">{{ $errors->first('image') }}</p>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="trailer" class="col-sm-2 control-label">Trailer</label>
                    <div class="col-sm-10">
                        <input type="text" name="trailer" value="{{ old('trailer') }}" class="form-control" id="trailer" placeholder="http://">
                        @if ($errors->has('trailer'))
                            <p class="help-block text-danger">{{ $errors->first('trailer') }}</p>
                        @endif
                    </div>
                </div> <!-- / .form-group -->
            </div>

            <!-- LIENS -->
            <div class="tab-pane fade" id="tab-liens">

                    <div class="form-group">
                        <label for="categories_id" class="col-sm-2 control-label">Catégorie</label>
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


                <div class="form-group">
                    <label for="actors" class="col-sm-2 control-label">Acteurs</label>
                    <div class="col-sm-10">
                        <select name="actors[]"  multiple="multiple" class="multiple form-control form-group-margin">

                            @foreach ($actors as $actor)
                                <option value="{{ $actor->id }}">{{ $actor->firstname }} {{ $actor->lastname }}</option>
                            @endforeach

                        </select>
                        @if ($errors->has('actors'))
                            <p class="help-block text-danger">{{ $errors->first('actors') }}</p>
                        @endif
                    </div>
                </div> <!-- / .form-group -->

                <div class="form-group">
                    <label for="directors" class="col-sm-2 control-label">Réalisateurs</label>
                    <div class="col-sm-10">
                        <select name="directors[]" multiple="multiple" class="multiple form-control form-group-margin">

                            @foreach ($directors as $director)
                                <option value="{{ $director->id }}">{{ $director->firstname }} {{ $director->lastname }}</option>
                            @endforeach

                        </select>
                        @if ($errors->has('directors'))
                            <p class="help-block text-danger">{{ $errors->first('directors') }}</p>
                        @endif
                    </div>
                </div> <!-- / .form-group -->

            </div>

            </div>

        <div class="form-group" style="margin-top: 20px;">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-lg btn-primary">Enregistrer</button>
            </div>
        </div> <!-- / .form-group -->
    </div>
</form>


@endsection
