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
        <a class="btn btn-flat btn-md disabled">Pro</a>
        <a href="{{ route('dashboard4') }}" class="btn btn-flat btn-md">Master</a>
    </div>


    <h2 class="title">Dashboard pro</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="stat-panel widget-support-tickets" id="dashboard-support-tickets">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-user"></i>&nbsp;&nbsp;R&eacute;partition des acteurs par ville
                    </div>
                </div> <!-- /.stat-row -->
                <div class="panel-body tab-content-padding">
                    <div class="panel-padding no-padding-vr">

                        @foreach ($actorsOrigin as $city => $nb)

                            <div class="data-chart hide" data-city="{{ $city }}" data-nb="{{ $nb }}"></div>

                        @endforeach

                        <div id="chart" style="height:300px">

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="stat-panel widget-support-tickets" id="dashboard-support-tickets">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-user"></i>&nbsp;&nbsp;R&eacute;partition des acteurs par âge
                    </div>
                </div> <!-- /.stat-row -->
                <div class="panel-body tab-content-padding">
                    <div class="panel-padding no-padding-vr">

                        @foreach ($tranchesAge as $tranche => $value)

                            <div class="data-donut hide" data-tranche="{{ $tranche }}" data-val="{{ round($value / $nbActors *100) }}"></div>

                        @endforeach

                        <div id="donut" style="height:300px">

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="stat-panel widget-support-tickets" id="dashboard-support-tickets">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-user"></i>&nbsp;&nbsp;R&eacute;partition des films par an des 4 meilleurs réalisateurs
                    </div>
                </div> <!-- /.stat-row -->
                <div class="panel-body tab-content-padding">
                    <div class="panel-padding no-padding-vr">


                        {{--  éléments HTML 5 pour la création des graphiques --}}
                        <?php $i = 0 ?>
                        @foreach ($bestDirectors as $bestDirector)
                            <?php
                            $i++;
                            ?>
                            <director data-num="d{{ $i }}" data-director="{{ $bestDirector }}"></director>

                        @endforeach

                        @foreach ($moviesBestDirectors as $key => $value)

                        <period data-date="{{ $key}}">

                            @foreach ($value as $director => $nbMovies)
                                <data data-director="{{ $director }}" data-nbMovies="{{  $nbMovies }}"></data>

                            @endforeach
                        </period>


                        @endforeach


                        <div id="area"></div>


                </div>
            </div>
        </div>
    </div>

    {{-- Test ApiController => transmission des données en JSON plutôt que HTML5 --}}
    <div data-url="{{ url('admin/api/best-directors')}}" id="api"></div>





@endsection


