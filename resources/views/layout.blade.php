<!DOCTYPE html>



<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>CineApp - @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Open Sans font from Google CDN -->
    @section('css')
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/all.css" type="text/css">
        <link rel="stylesheet" href="/css/app.css" type="text/css">
    @show <!-- permet d'ajouter des css spécifique sur certaines vues -->
    <!-- on ne ferme pas la section -->

    <!--[if lt IE 9]>
    <script src="js/ie.min.js"></script>
    <![endif]-->
</head>

<body class="theme-default main-menu-animated">

<script>var init = [];</script>

<div id="main-wrapper">


@include('Partials._navbar')


    <div id="main-menu" role="navigation">
        <div id="main-menu-inner">
            <div class="menu-content top" id="menu-content-demo">

            </div>
            @include('Partials._navigation')


        </div> <!-- / #main-menu-inner -->
    </div> <!-- / #main-menu -->
    <!-- /4. $MAIN_MENU -->

    <div id="content-wrapper">
        <div class="page-header">
            @yield('header')
        </div>

        {{-- Emplacement des alertes --}}
        @include('Partials/_flashDatas')

        {{--Contenu principal de la page--}}
        @yield('content')

    </div> <!-- / #content-wrapper -->

    {{-- Footer--}}
    @include('Partials._footer')

    <div id="main-menu-bg"></div>
</div> <!-- / #main-wrapper -->

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Pixel Admin's js -->

<script src="/js/all.js"></script>
@show
<script type="text/javascript">
    init.push(function () {
        // Javascript code here
    })
    window.PixelAdmin.start(init);
</script>

</body>
</html>