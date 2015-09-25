        @if (session("moviesFavoris")!== NULL)
            @foreach (session("moviesFavoris") as $movieFav)
                <div class="message">
                    <img src="{{ \App\Model\Movies::find($movieFav)->image }}" alt="{{ \App\Model\Movies::find($movieFav)->title }}" class="message-avatar">
                    <a href="#" class="message-subject">{{ \App\Model\Movies::find($movieFav)->title }}</a>
                    <div class="message-description">
                        from <a href="#">{{ Auth::user()->name }}</a>
                        &nbsp;&nbsp;·&nbsp;&nbsp;
                        2h ago
                    </div>
                </div> <!-- / .message -->
            @endforeach
            @else
            <a href="#" class="messages-link">PAS DE FILMS EN FAVORIS</a>
        @endif

