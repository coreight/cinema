<!-- 2. $MAIN_NAVIGATION ===========================================================================

        Main navigation
    -->
<div id="main-navbar" class="navbar navbar-inverse" role="navigation">
        <!-- Main menu toggle -->
    <button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span class="hide-menu-text">HIDE MENU</span></button>

<div class="navbar-inner">
        <!-- Main navbar header -->
    <div class="navbar-header">

        <!-- Logo -->
    <a href="/" class="navbar-brand">
    <div><img alt="Pixel Admin" src="/images/pixel-admin/main-navbar-logo.png"></div>
    CineApp
    </a>

        <!-- Main navbar toggle -->
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>

</div> <!-- / .navbar-header -->

<div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
    <div>
    <ul class="nav navbar-nav">

     <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="menu-icon fa fa-users"></i> Acteurs</a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('actors.index') }}"><i class="menu-icon fa fa-search"></i> Voir</a></li>
            <li><a href="{{ route('actors.create') }}"><i class="menu-icon fa fa-pencil"></i> Créer</a></li>
        </ul>
    </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="menu-icon fa fa-user"></i> Réalisateurs</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('directors.index') }}"><i class="menu-icon fa fa-search"></i> Voir</a></li>
                <li><a href="{{ route('directors.create') }}"><i class="menu-icon fa fa-pencil"></i> Créer</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="menu-icon fa fa-video-camera"></i> Films</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('movies.index') }}"><i class="menu-icon fa fa-search"></i> Voir</a></li>
                <li><a href="{{ route('movies.create') }}"><i class="menu-icon fa fa-pencil"></i> Créer</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="menu-icon fa fa-toggle-right"></i> Cinémas</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('cinemas.index') }}"><i class="menu-icon fa fa-search"></i> Voir</a></li>
                <li><a href="{{ route('cinemas.create') }}"><i class="menu-icon fa fa-pencil"></i> Créer</a></li>
            </ul>
        </li>     <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="menu-icon fa fa-tags"></i> Catégories</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('categories.index') }}"><i class="menu-icon fa fa-search"></i> Voir</a></li>
                <li><a href="{{ route('categories.create') }}"><i class="menu-icon fa fa-pencil"></i> Créer</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="menu-icon fa fa-users"></i> Utilisateurs</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('users.index') }}"><i class="menu-icon fa fa-search"></i> Voir</a></li>
                <li><a href="{{ route('users.create') }}"><i class="menu-icon fa fa-pencil"></i> Créer</a></li>
            </ul>
        </li>

</ul> <!-- / .navbar-nav -->


</div>
</div> <!-- / #main-navbar-collapse -->
</div> <!-- / .navbar-inner -->
</div> <!-- / #main-navbar -->
<!-- /2. $END_MAIN_NAVIGATION -->