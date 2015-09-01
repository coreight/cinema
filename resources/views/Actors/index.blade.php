@extends('layout')

@section('title')
    Acteurs
@endsection

@section('header')
    <h2><span class="text-light-gray">Acteurs /</span> index</h2>
@endsection

@section('content')


    <h2>Acteurs</h2>

    <script>
        init.push(function () {
            $('#jq-datatables-example').dataTable();
            $('#jq-datatables-example_wrapper .table-caption').text('Liste complète des acteurs');
            $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Recherche...');
        });
    </script>
    <!-- / Javascript -->


            <div class="table-danger">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Date de naissance</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($actors as $actor)
                        <tr>
                            <td>{{ $actor->id }}</td>
                            <td>{{ $actor->firstname }}</td>
                            <td> {{ $actor->lastname }}</td>
                            <td> {{ $actor->dob }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


@endsection
