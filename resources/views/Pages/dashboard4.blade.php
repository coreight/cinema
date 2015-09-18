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
        <a href="{{ route('dashboard') }}" class="btn btn-flat btn-md">Simple</a>
        <a href="{{ route('dashboard2') }}" class="btn btn-flat btn-md">Advance</a>
        <a href="{{ route('dashboard3') }}"  class="btn btn-flat btn-md">Pro</a>
        <a class="btn btn-flat btn-md disabled">Master</a>
    </div>


    <h2 class="title">Dashboard Master</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="stat-panel widget-support-tickets" id="dashboard-support-tickets">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-euro"></i>&nbsp;&nbsp;R&eacute;partition du budget pour les 4 meilleures catégories
                    </div>
                </div> <!-- /.stat-row -->
                <div class="panel-body tab-content-padding">
                    <div class="panel-padding no-padding-vr">


                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="stat-panel widget-support-tickets" id="dashboard-support-tickets">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-pencil"></i>&nbsp;&nbsp;R&eacute;partition du nombre de commentaires par cinéma
                    </div>
                </div> <!-- /.stat-row -->
                <div class="panel-body tab-content-padding">
                    <div class="panel-padding no-padding-vr">

                        <comments nbtotal="{{$nbTotalComments}}"></comments>

                        @foreach ($commentsByCinemas as $commentsByCinema)

                            {{--{{dump($commentsByCinema)}}--}}
                            <cine title="{{ $commentsByCinema->title }}" nb="{{ $commentsByCinema->nb }}"">

                                {{-- On génère les éléments pour les films de chaque cinéma --}}
                                <?php
                                    $comments = new \App\Model\Comments();
                                    $commentsByMovies = $comments->commentsByMovie($commentsByCinema->id);


                                ?>
                                @foreach($commentsByMovies as $commentsByMovie)

                                    <movie title="{{ $commentsByMovie->title }}" nb="{{ $commentsByMovie->nb }}"></movie>

                                @endforeach

                            </cine>

                        @endforeach


                        <div id="highcharts" style="width:100%; height:400px;"></div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="stat-panel widget-support-tickets" id="dashboard-support-tickets">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-pencil"></i>&nbsp;&nbsp;R&eacute;partition des films par cat&eacute;gories
                    </div>
                </div> <!-- /.stat-row -->
                <div class="panel-body tab-content-padding">
                    <div class="panel-padding no-padding-vr">

                        <nbmovies nb="{{ $nbTotalMovies }}"></nbmovies>
                        @foreach ($moviesByCategorie as $key => $value)

                            <movcat category="{{ $key }}" nb="{{ $value }}"></movcat>

                        @endforeach

                            <div id="highcharts-pie" style="width:100%; height:400px;"></div>


                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection


