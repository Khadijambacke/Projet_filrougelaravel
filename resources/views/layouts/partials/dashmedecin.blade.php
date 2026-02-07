<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Médecin - Hôpital Dalal Diamm</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            background-color: #f0f2f5;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar .nav-link {
            color: #fff;
            font-weight: 500;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #495057;
            text-decoration: none;
        }

        /* Content */
        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        table th, table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <!-- Sidebar Médecin -->
    <nav class="sidebar p-3">
        <h3 class="text-center mb-4">Hôpital Dalal Diamm</h3>
        <ul class="nav nav-pills flex-column mb-auto">

            <li class="nav-item mb-2">
                <a href="{{ route('medconsultation') }}" class="nav-link">Mes consultations</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('medpatient') }}" class="nav-link">Mes patients</a>
            </li>
            <li class="nav-item mt-auto">
                <a href="#" class="nav-link"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>

    <!-- Contenu principal -->
    <div class="content">
        <div class="welcome">
            <h3>Bienvenue Dr. {{ Auth::user()->name }}</h3>
            <p>Voici vos consultations à venir :</p>
        </div>
@yield('content')
       
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
