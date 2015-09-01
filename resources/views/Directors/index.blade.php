@extends('layout')


@section('title')
    Réalisateurs
@endsection


@section('content')

    @section('header')
        <h2><span class="text-light-gray">Réalisateurs /</span> index</h2>
    @endsection

    <h2>Réalisateurs</h2>


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
        @foreach($directors as $director)
            <tr>
                <td>{{ $director->id }}</td>
                <td>{{ $director->firstname }}</td>
                <td> {{ $director->lastname }}</td>
                <td> {{ $director->dob }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
