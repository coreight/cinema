@extends('layout')

@section('title')
    Commentaires
@endsection

@section('content')

    @section('header')
        <h2><span class="text-light-gray">Films /</span> index</h2>
    @endsection

    <h2>Commentaires</h2>


    <div class="stat-cell bg-success valign-middle col-md-4">
        <!-- Stat panel bg icon -->
        <i class="fa fa-pencil bg-icon"></i>
        <!-- Extra large text -->
        <span class="text-xlg"><strong>{{ $bestCommenter[0]->username }}</strong></span><br>
        <!-- Big text -->
        <span class="text-bg">a le plus commenté</span><br>
        <!-- Small text -->
        <span class="text-sm">({{ $bestCommenter[0]->nb_comments }} commentaires)</span>
    </div>

    <!-- Tableau -->
    <div class="table table-light">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-comments" id="jq-datatables-example">
            <thead>
            <tr>
                <th>Id</th>
                <th>Film</th>
                <th>Contenu</th>
                <th>User</th>
                <th>Note</th>
                <th>Statut</th>
                <th>Date création</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr class="
                    @if ($comment->state == 0)
                        alert-danger
                    @elseif ($comment->state ==1)
                        alert-warning
                    @else
                        alert-success
                    @endif">
                    <td>{{ $comment->id }}</td>

                    {{-- A REMPLACER PAR LE TITRE --}}
                    <td> {{ $comment->movie->title }}</td>

                    <td> {{ $comment->content }}</td>

                    {{-- A REMPLACER PAR LE NOM --}}
                    <td> {{ $comment->user->username }}</td>

                    <td> {{ $comment->note }} /5</td>
                    <td> {{ $comment->state}}</td>
                    <td> {{ $comment->date_created}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection
