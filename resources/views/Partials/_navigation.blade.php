<div id="main-menu-inner">

    <div class="menu-content top" id="menu-content-demo">
        <!-- Menu custom content demo
             CSS:        styles/pixel-admin-less/demo.less or styles/pixel-admin-scss/_demo.scss
             Javascript: html/assets/demo/demo.js
         -->
        <div>
            <div class="text-bg"><span class="text-slim">Welcome,</span> <span class="text-semibold">{{ Auth::user()->firstname }}</span></div>

            <img src="{{ Auth::user()->photo }}" alt="{{ Auth::user()->name }}" class="">
            <div class="btn-group">
                <a href="#" class="btn btn-xs btn-primary btn-outline dark"><i class="fa fa-envelope"></i></a>
                <a href="#" class="btn btn-xs btn-primary btn-outline dark"><i class="fa fa-user"></i></a>
                <a href="#" class="btn btn-xs btn-primary btn-outline dark"><i class="fa fa-cog"></i></a>
                <a href="{{ url('auth/logout') }}" class="btn btn-xs btn-danger btn-outline dark"><i class="fa fa-power-off"></i></a>
            </div>
            <a href="#" class="close">&times;</a>
        </div>
    </div>
    <ul class="navigation">
        <li class="mm-dropdown">
            <a href="#"><i class="menu-icon fa fa-users"></i><span class="mm-text">Acteurs</span></a>
            <ul>
                <li>
                    <a tabindex="-1" href={{ route('actors.index') }}><span class="mm-text">Index</span></a>
                </li>
                <li>
                    <a tabindex="-1" href={{ route('actors.create') }}><span class="mm-text">Créer</span></a>
                </li>
            </ul>
        </li>
        <li>
            <a href={{ route('directors.index') }}><i class="menu-icon fa fa-user"></i><span class="mm-text">Réalisateurs</span></a>
        </li>
        <li>
            <a href={{ route('movies.index') }}><i class="menu-icon fa fa-video-camera"></i><span class="mm-text">Films</span></a>
        </li>
        <li>
            <a href={{ route('cinemas.index') }}><i class="menu-icon fa fa-toggle-right"></i><span class="mm-text">Cinémas</span></a>
        </li>
        <li>
            <a href={{ route('categories.index') }}><i class="menu-icon fa fa-tags"></i><span class="mm-text">Catégories</span></a>
        </li>


    </ul> <!-- / .navigation -->
</div>