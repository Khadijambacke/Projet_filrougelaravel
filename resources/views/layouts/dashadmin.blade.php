<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Hôpital Dalal Diamm</title>

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

        /* Cards */
        .card {
            cursor: pointer;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.03);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar p-3">
        <h3 class="text-center mb-4">Hôpital Dalal Diamm</h3>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item mb-2">
                <a href="" class="nav-link active">Accueil</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('servicsadmin') }}" class="nav-link"> Services de l'hopital</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('vuemedecin.index')  }}" class="nav-link">Medecin</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('reservationsnadmin')  }}" class="nav-link"> Rendez-vous patient </a>
            </li>
            <li class="nav-item mb-2">
                <a href="" class="nav-link"> Patient</a>
            </li>
            <li class="nav-item mb-2">
                <a href="" class="nav-link"></a>
            </li>
            <li class="nav-item mt-auto">
                <a href="{{ route('logout') }}" class="nav-link"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- Main Content -->
    <div class="content">
        <!-- Header -->
        <div class="welcome">
            <h3>Bienvenue,{{ Auth::user()->name }} à l'Hôpital Dalal Diamm</h3>
        </div>
        <!-- <div class="boutton">
            <button>ajouter un services</button>
            <button>ajouter un medecin</button>
        </div> -->
        <!-- Dashboard cards -->
        @yield('contenu')
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
