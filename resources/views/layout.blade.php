<!DOCTYPE html>
<!--

TABLE OF CONTENTS.

Use search to find needed section.

===================================================================

|  1. $BODY                        |  Body                        |
|  2. $MAIN_NAVIGATION             |  Main navigation             |
|  3. $NAVBAR_ICON_BUTTONS         |  Navbar Icon Buttons         |
|  4. $MAIN_MENU                   |  Main menu                   |
|  5. $UPLOADS_CHART               |  Uploads chart               |
|  6. $EASY_PIE_CHARTS             |  Easy Pie charts             |
|  7. $EARNED_TODAY_STAT_PANEL     |  Earned today stat panel     |
|  8. $RETWEETS_GRAPH_STAT_PANEL   |  Retweets graph stat panel   |
|  9. $UNIQUE_VISITORS_STAT_PANEL  |  Unique visitors stat panel  |
|  10. $SUPPORT_TICKETS            |  Support tickets             |
|  11. $RECENT_ACTIVITY            |  Recent activity             |
|  12. $NEW_USERS_TABLE            |  New users table             |
|  13. $RECENT_TASKS               |  Recent tasks                |

===================================================================

-->


<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>CineApp - @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Open Sans font from Google CDN -->

    @section('css')
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/all.css" type="text/css">
        <link rel="stylesheet" href="/css/app.css" type="text/css">
    @show <!-- permet d'ajouter des css spécifique sur certaines vues -->
    <!-- on ne ferme pas la section -->

    <!--[if lt IE 9]>
    <script src="js/ie.min.js"></script>
    <![endif]-->
</head>


<!-- 1. $BODY ======================================================================================
	
	Body

	Classes:
	* 'theme-{THEME NAME}'
	* 'right-to-left'      - Sets text direction to right-to-left
	* 'main-menu-right'    - Places the main menu on the right side
	* 'no-main-menu'       - Hides the main menu
	* 'main-navbar-fixed'  - Fixes the main navigation
	* 'main-menu-fixed'    - Fixes the main menu
	* 'main-menu-animated' - Animate main menu
-->
<body class="theme-default main-menu-animated">

<script>var init = [];</script>

<div id="main-wrapper">


@include('Partials._navbar')


    <!-- 4. $MAIN_MENU =================================================================================

            Main menu

            Notes:
            * to make the menu item active, add a class 'active' to the <li>
              example: <li class="active">...</li>
            * multilevel submenu example:
                <li class="mm-dropdown">
                  <a href="#"><span class="mm-text">Submenu item text 1</span></a>
                  <ul>
                    <li>...</li>
                    <li class="mm-dropdown">
                      <a href="#"><span class="mm-text">Submenu item text 2</span></a>
                      <ul>
                        <li>...</li>
                        ...
                      </ul>
                    </li>
                    ...
                  </ul>
                </li>
    -->
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
<!-- Get jQuery from Google CDN -->
<!--[if !IE]> -->
<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js">'+"<"+"/script>"); </script>
<!-- <![endif]-->
<!--[if lte IE 9]>
<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
<![endif]-->

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