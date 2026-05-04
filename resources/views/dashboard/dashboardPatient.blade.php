<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    margin: 0;
    display: flex;
    min-height: 100vh;
    background: #eef2f1;
    font-family: Arial, sans-serif;
}

/* SIDEBAR */
.sidebar {
    width: 250px;
    background: #0D5C4A;
    color: #fff;
    padding: 20px;
}

.sidebar h4 {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    padding: 10px;
    border-radius: 8px;
    color: #fff;
    text-decoration: none;
    margin-bottom: 10px;
    font-size: 14px;
}

.sidebar a:hover,
.sidebar a.active {
    background: rgba(255,255,255,0.15);
}

/* CONTENT */
.content {
    flex: 1;
    padding: 25px;
}

/* HEADER */
.header {
    background: #fff;
    padding: 15px 20px;
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

/* STATS */
.stat-card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

.stat-card h6 {
    color: #666;
    font-size: 13px;
}

.stat-card h3 {
    color: #0D5C4A;
    margin-top: 5px;
}

/* ACTION CARDS */
.action-card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    height: 100%;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    transition: 0.2s;
}

.action-card:hover {
    transform: translateY(-4px);
}

.action-card h5 {
    color: #0D5C4A;
}

.btn-main {
    background: #0D5C4A;
    color: #fff;
    padding: 8px 14px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 13px;
}

.btn-main:hover {
    background: #0a4a3a;
}

/* ACTIVITY */
.activity {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    margin-top: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

.activity p {
    font-size: 14px;
    margin-bottom: 8px;
    color: #555;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4>Dalal Diamm</h4>

    <a href="{{ route('dashboard') }}" class="active">Accueil</a>
    <a href="{{ route('patientservices') }}">Services</a>
    <a href="{{ route('mesreservations') }}">Rendez-vous</a>

    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       Déconnexion
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

<!-- CONTENT -->
<div class="content">

    <!-- HEADER -->
    <div class="header d-flex justify-content-between align-items-center">
        <h5>Bienvenue, {{ Auth::user()->name }}</h5>
        <span style="font-size:13px;color:#777;">Tableau de bord</span>
    </div>

    <!-- STATS -->
    <div class="row g-3 mb-3">
        <div class="col-md-4">
            <div class="stat-card">
                <h6>Rendez-vous</h6>
                <h3>{{  $nbrrendezvous}}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">
                <h6>Services disponibles</h6>
                <h3>12</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">
                <h6>Notifications</h6>
                <h3>1</h3>
            </div>
        </div>
    </div>

    <!-- ACTIONS -->
    <div class="row g-3">

        <div class="col-md-4">
            <div class="action-card">
                <h5>Prendre un rendez-vous</h5>
                <p>Planifiez rapidement une consultation.</p>
                <a href="{{ route('patientservices') }}" class="btn-main">Commencer</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="action-card">
                <h5>Mes rendez-vous</h5>
                <p>Voir ou modifier vos réservations.</p>
                <a href="{{ route('mesreservations') }}" class="btn-main">Voir</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="action-card">
                <h5>Mon profil</h5>
                <p>Mettre à jour vos informations.</p>
                <a href="#" class="btn-main">Modifier</a>
            </div>
        </div>

    </div>

    @if($nextRdv)
    <div class="activity-item">
        <strong>{{ $nextRdv->service->name ?? 'Service' }}</strong>

        <div class="mt-1">
            <small>
                {{ \Carbon\Carbon::parse($nextRdv->date_reservation)->format('d M Y à H:i') }}
            </small>
        </div>

        <div class="mt-2">
            <span class="badge bg-success">Confirmé</span>
        </div>
    </div>
@else
    <p>Aucun rendez-vous confirmé</p>
@endif
    <a href="{{ route('patientservices') }}" class="btn-main mt-3">
        Prendre un rendez-vous
    </a>
</div>

</div>

</body>
</html>
