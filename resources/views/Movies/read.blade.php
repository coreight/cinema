@extends('layout')


@section('content')


    <h2>{{ $movies->title }}</h2>

    <img src="{{ $movies->image }}" alt="{{ $movies->title }}" class="profil-picture">
    <h3>Synopsis</h3>
    <p>{{ str_limit(strip_tags($movies->synopsis), 2000) }} </p>

    <div class="widget-article-comments">
        <h3>Commentaires</h3>
        <div class="comments-list">
        @foreach ($movies->comments as $comment)
            <img src="{{ Auth::user()->photo }}" alt="{{ Auth::user()->id }}" class="comment-avatar">
            <div class="comment-body">
                <div class="comment-text">
                    <div class="comment-heading">
                        par {{ $comment->user->username }}<span>{{ $comment->created_at }}</span>
                    </div>
                    <div class="label label-warning">{{ $comment->note }} / 5</div><br>
                    {{ $comment->content }}
                </div>
             </div>

        @endforeach
        </div>

        <div class="comment">
            <img src="{{ Auth::user()->photo }}" alt="{{ Auth::user()->id }}" class="comment-avatar">
            <div class="comment-body">
                <form method="post" action="{{ route('movies.comment', ['id' => $movies->id]) }}" id="leave-comment-form" class="no-padding no-border expanding-input expanded">
                    {!! csrf_field() !!}
                    <textarea class="form-control expanding-input-target" rows="3" name="content" placeholder="Ecrire un message" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 68px;"></textarea>
                    <div class="expanding-input-hidden expanding-input-content" style="margin-top: 10px;">
                        <label class="checkbox-inline pull-left">
                            <input type="checkbox" class="px">
                        </label>
                        <button class="btn btn-primary pull-right">Commenter</button>
                    </div>
                </form>
            </div> <!-- / .comment-body -->
        </div>

    </div>

@endsection
