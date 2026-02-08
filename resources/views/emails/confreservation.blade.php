<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de réservation</title>
</head>
<body>
    <h1>Bonjour {{ $user->name }} !</h1>
    <p>Votre réservation pour le service <strong>{{ $service->titre }}</strong> a été enregistrée avec succès.</p>

    <p>
        <strong>Date :</strong> {{ $reservation->date_reservation }}<br>
        <strong>Heure :</strong> {{ $reservation->heure_reservation }}
    </p>

    @if($reservation->commentaire)
        <p><strong>Commentaire :</strong> {{ $reservation->commentaire }}</p>
    @endif

    <p>Merci pour votre confiance !</p>
</body>
</html>
