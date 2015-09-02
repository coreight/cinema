
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
