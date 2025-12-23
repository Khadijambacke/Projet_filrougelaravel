<!DOCTYPE html>
<html>
<head>
    <title>Liste des services</title>
</head>
<body>

<h1>Nos services</h1>


    <ul>
        @foreach($services as $service)
            <li>
                <strong>{{ $service->titre }}</strong><br>
                Prix : {{ $service->prix }} FCFA<br>
                Durée : {{ $service->duree }} minutes<br>
                Médecin : {{ $service->medecin->name ?? 'Non défini' }}
            </li>
        @endforeach
    </ul>


</body>
</html>
