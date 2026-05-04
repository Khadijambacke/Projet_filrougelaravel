<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard – Dalal Diamm</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<style>
  * { box-sizing: border-box; }

  body {
    margin: 0;
    background: #eef2f1;
    font-family: 'DM Sans', Arial, sans-serif;
    min-height: 100vh;
  }

  /* ───── LAYOUT PRINCIPAL ───── */
  .dash-layout {
    display: flex;
    min-height: 100vh;
  }

  /* ───── SIDEBAR ───── */
  .sidebar {
    width: 230px;
    flex-shrink: 0;
    background: #0D5C4A;
    color: #fff;
    padding: 24px 16px;
    display: flex;
    flex-direction: column;
    position: sticky;
    top: 0;
    height: 100vh;
    overflow-y: auto;
    transition: transform 0.28s cubic-bezier(.4,0,.2,1);
    z-index: 200;
  }

  .sidebar-brand {
    text-align: center;
    margin-bottom: 28px;
  }

  .sidebar-brand strong {
    display: block;
    font-size: 17px;
    font-weight: 700;
    letter-spacing: 0.3px;
  }

  .sidebar-brand span {
    font-size: 11px;
    color: #7ecab0;
    letter-spacing: 0.5px;
  }

  .sidebar-nav a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 9px 12px;
    border-radius: 9px;
    color: rgba(255,255,255,0.75);
    font-size: 13.5px;
    text-decoration: none;
    margin-bottom: 4px;
    transition: background 0.15s, color 0.15s;
  }

  .sidebar-nav a:hover,
  .sidebar-nav a.active {
    background: rgba(255,255,255,0.18);
    color: #fff;
  }

  .sidebar-nav .nav-icon {
    width: 18px;
    text-align: center;
    font-size: 14px;
  }

  .sidebar-divider {
    border: none;
    border-top: 0.5px solid rgba(255,255,255,0.12);
    margin: 12px 0;
  }

  .sidebar-logout {
    margin-top: auto;
  }

  .sidebar-logout a {
    color: #f08080 !important;
  }

  /* ───── OVERLAY MOBILE ───── */
  .sidebar-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.45);
    z-index: 199;
  }

  /* ───── ZONE PRINCIPALE ───── */
  .main-zone {
    flex: 1;
    display: flex;
    flex-direction: column;
    min-width: 0;
  }

  /* ───── TOPBAR ───── */
  .topbar {
    background: #fff;
    padding: 12px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 0.5px solid #e0e8e5;
    position: sticky;
    top: 0;
    z-index: 100;
  }

  .topbar-left {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .hamburger-btn {
    display: none;
    width: 34px;
    height: 34px;
    border-radius: 8px;
    border: 0.5px solid #dde8e4;
    background: #f5faf8;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 4px;
    padding: 7px 6px;
    cursor: pointer;
  }

  .hamburger-btn span {
    display: block;
    height: 2px;
    width: 18px;
    background: #0D5C4A;
    border-radius: 2px;
    transition: all 0.2s;
  }

  .topbar-title {
    font-size: 14px;
    font-weight: 600;
    color: #1a1a1a;
  }

  .topbar-right {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .user-name {
    font-size: 13px;
    color: #666;
  }

  .user-avatar {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, #0D5C4A, #1cc88a);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 700;
    color: #fff;
  }

  /* ───── CONTENU ───── */
  .page-content {
    flex: 1;
    padding: 24px 28px;
  }

  /* ───── RESPONSIVE MOBILE ───── */
  @media (max-width: 768px) {
    .sidebar {
      position: fixed;
      height: 100%;
      transform: translateX(-230px);
    }

    .sidebar.open {
      transform: translateX(0);
      box-shadow: 4px 0 24px rgba(0,0,0,0.18);
    }

    .sidebar-overlay.open {
      display: block;
    }

    .hamburger-btn {
      display: flex;
    }

    .user-name {
      display: none;
    }

    .page-content {
      padding: 16px;
    }
  }
</style>
</head>
<body>

<div class="dash-layout">

  <!-- Overlay mobile -->
  <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

  <!-- SIDEBAR -->
  <nav class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <strong>Dalal Diamm</strong>
      <span>Espace patient</span>
    </div>

    <div class="sidebar-nav">
      <a href="{{ route('dashboard') }}" @class(['active' => request()->routeIs('dashboard')])>
        <i class="fas fa-home nav-icon"></i> Accueil
      </a>
      <a href="{{ route('patientservices') }}" @class(['active' => request()->routeIs('patientservices')])>
        <i class="fas fa-stethoscope nav-icon"></i> Services
      </a>
      <a href="{{ route('mesreservations') }}" @class(['active' => request()->routeIs('mesreservations')])>
        <i class="fas fa-calendar-check nav-icon"></i> Rendez-vous
      </a>
    </div>

    <hr class="sidebar-divider">
    <div class="sidebar-logout">
      <div class="sidebar-nav">
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt nav-icon"></i> Déconnexion
        </a>
      </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
  </nav>

  <!-- ZONE PRINCIPALE -->
  <div class="main-zone">

    <!-- TOPBAR -->
    <div class="topbar">
      <div class="topbar-left">
        <button class="hamburger-btn" id="hamburgerBtn" onclick="openSidebar()">
          <span></span><span></span><span></span>
        </button>
        <span class="topbar-title"> Dalal Diamm</span>
      </div>
      <div class="topbar-right">
        <span class="user-name">{{ auth()->user()->name ?? '' }}</span>
        <div class="user-avatar">
          {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 2)) }}
        </div>
      </div>
    </div>

    <!-- CONTENU DE LA PAGE -->
    <div class="page-content">
      @yield('contenu')
    </div>

  </div>
</div>

<script>
  function openSidebar() {
    document.getElementById('sidebar').classList.add('open');
    document.getElementById('sidebarOverlay').classList.add('open');
  }
  function closeSidebar() {
    document.getElementById('sidebar').classList.remove('open');
    document.getElementById('sidebarOverlay').classList.remove('open');
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>