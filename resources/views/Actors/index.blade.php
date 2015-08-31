
<html>
<body>

    <h2>Acteurs</h2>

    <h3>{{ $title  }}</h3>
    @foreach ($firstnames as $firstname)
        <li>{{ $firstname }}</li>
    @endforeach

    <h3>Villes</h3>

    @foreach ($villes as $key => $value)
        <p>{{ $key }} :

        @foreach ($value as $val)
            {{ $val }}
        @endforeach
        </p>
    @endforeach

    <h3>Détail acteurs</h3>
    @foreach ($acteurs as $acteur)
        {{ $acteur['firstname']}} {{$acteur['lastname']}}, {{$acteur['age']}} ans
        <br>
    @endforeach



</body>
</html>