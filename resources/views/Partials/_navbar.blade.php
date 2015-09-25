<!-- 2. $MAIN_NAVIGATION ===========================================================================

        Main navigation
    -->
<div id="main-navbar" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Main menu toggle -->
    <button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span class="hide-menu-text">HIDE MENU</span></button>

<div class="navbar-inner">
        <!-- Main navbar header -->
    <div class="navbar-header">

        <!-- Logo -->
    <a href="/admin" class="navbar-brand">
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="menu-icon fa fa-users"></i> Users</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('users.index') }}"><i class="menu-icon fa fa-search"></i> Voir</a></li>
                <li><a href="{{ route('users.create') }}"><i class="menu-icon fa fa-pencil"></i> Créer</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="menu-icon fa fa-pencil"></i> Comm.</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('comments.index') }}"><i class="menu-icon fa fa-search"></i> Voir</a></li>
            </ul>
        </li>
        <li class="nav-icon-btn nav-icon-btn-success dropdown">
            <a href="#messages" class="dropdown-toggle" data-toggle="dropdown">
                <span class="label" id="favCounter" data-count="{{ count(session("moviesFavoris")) }}">
                    {{ count(session("moviesFavoris")) }}
                </span>
                <i class="nav-icon fa fa-star"></i>
                <span class="small-screen-text">Films en favoris</span>
            </a>
            <!-- MESSAGES -->
            <div class="dropdown-menu pull-right  widget-messages-alt no-padding" style="width: 300px;">
                <div class="messages-list" id="main-navbar-messages"   data-url="{{ route('movies.ajax') }}">

            @include('Movies.ajax')

                </div> <!-- / .messages-list -->
                <a href="{{ route('movies.flushFavoris') }}" class="messages-link">EFFACER LES FAVORIS</a>
            </div> <!-- / .dropdown-menu -->

        </li>
        <div class="nav navbar-nav pull-right right-navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
                    <img src="{{ Auth::user()->photo }}" alt="{{ Auth::user()->id }}">
                    <span>{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="dropdown-icon fa fa-user"></i>&nbsp;&nbsp;Profil</a></li>
                    <li><a href="{{ route('auth.update') }}"><i class="dropdown-icon fa fa-lock"></i>&nbsp;&nbsp;Compte</a></li>
                    <li><a href="#"><i class="dropdown-icon fa fa-cog"></i>&nbsp;&nbsp;Paramètres</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('auth/logout') }}"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
                </ul>
            </li>
        </div>

</ul> <!-- / .navbar-nav -->


</div>
</div> <!-- / #main-navbar-collapse -->
</div> <!-- / .navbar-inner -->
</div> <!-- / #main-navbar -->
<!-- /2. $END_MAIN_NAVIGATION -->