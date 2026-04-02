<!DOCTYPE html>
<html lang="en">
<head>
    <title>Health Center</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assetpatient/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/tooplate-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/font-awesome.min.css') }}">

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- ================= HEADER ================= -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-5">
                <p>Bienvenue a BELVUE CLINIQUE</p>
            </div>
            <div class="col-md-8 col-sm-7 text-align-right">
                <span><i class="fa fa-phone"></i>+221 764038634</span>
                <span><i class="fa fa-calendar-plus-o"></i> Lundi-Vrendredi 08:00-22:00</span>
                <span><i class="fa fa-envelope-o"></i> info@company.com</span>
            </div>
        </div>
        
    </div>
</header>

<!-- ================= MENU ================= -->
<section class="navbar navbar-default navbar-static-top">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="#top" class="navbar-brand">
                <i class="fa fa-h-square"></i>Health Center
            </a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#top" class="smoothScroll">Acceuil</a></li>
                <li><a href="#about" class="smoothScroll">A propos </a></li>
                <li><a href="#team" class="smoothScroll">Services </a></li>
                <li><a href="#news" class="smoothScroll">Comment reserver </a></li>
                <li><a href="{{ route('dashboard') }}" class="smoothScroll">Reservations</a></li>
                <li><a href="#google-map" class="smoothScroll">Contact</a></li>
            </ul>
        </div>

    </div>
</section>

<!-- ================= HOME / HERO ================= -->
<head>
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,700;1,400&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    /* Hero général */
    #home {
      position: relative;
      min-height: 100vh;
      display: flex;
      align-items: center;
      overflow: hidden;
      background: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=1600&q=80&fit=crop&crop=center') center center / cover no-repeat;
    }

    /* Overlay vert africain */
    #home::before {
      content:"";
      position:absolute;
      inset:0;
      background: linear-gradient(125deg, rgba(8,52,42,0.93) 0%, rgba(12,72,58,0.80) 55%, rgba(5,35,28,0.62) 100%);
      z-index:1;
    }

    /* Motif géométrique africain subtil */
    #home::after {
      content:"";
      position:absolute;
      inset:0;
      opacity:0.06;
      background-image:
        repeating-linear-gradient(60deg, #D4A853 0px, #D4A853 1px, transparent 1px, transparent 30px),
        repeating-linear-gradient(-60deg, #D4A853 0px, #D4A853 1px, transparent 1px, transparent 30px),
        repeating-linear-gradient(0deg, #D4A853 0px, #D4A853 1px, transparent 1px, transparent 30px);
      pointer-events:none;
      z-index:1;
    }

    /* Contenu */
    .hero-content {
      position: relative;
      z-index: 2;
      max-width: 700px;
      padding: 0 20px;
      color: #fff;
    }

    .hero-badge {
      display:inline-flex;
      align-items:center;
      gap:10px;
      background:rgba(212,168,83,0.15);
      border:1px solid rgba(212,168,83,0.35);
      color:rgba(255,255,255,0.9);
      font-size:11px;
      letter-spacing:2.5px;
      text-transform:uppercase;
      font-weight:500;
      padding:7px 18px;
      border-radius:100px;
      margin-bottom:20px;
    }
    .hero-badge span {
      width:5px;
      height:5px;
      background:#D4A853;
      border-radius:50%;
      display:inline-block;
    }

    .hero-title {
      font-family: 'Montserrat', sans-serif;
      font-size:clamp(2.4rem,5vw,4rem);
      font-weight:700;
      line-height:1.1;
      margin-bottom:20px;
      text-shadow:0 2px 20px rgba(0,0,0,0.25);
    }
    .hero-title em {
      font-style:italic;
      color:#D4A853;
    }

    .hero-subtitle {
      font-family: 'Lora', serif;
      font-size:clamp(0.95rem,1.6vw,1.1rem);
      color:rgba(255,255,255,0.68);
      line-height:1.8;
      font-weight:400;
      max-width:480px;
      margin-bottom:30px;
      border-left:3px solid #D4A853;
      padding-left:16px;
    }

    .hero-buttons a {
      display:inline-flex;
      align-items:center;
      gap:9px;
      font-family: 'Montserrat', sans-serif;
      font-weight:600;
      font-size:14px;
      padding:14px 30px;
      border-radius:10px;
      text-decoration:none;
      transition: all 0.2s;
    }
    .hero-buttons .primary {
      background:#D4A853;
      color:#1a1200;
    }
    .hero-buttons .primary:hover {
      background:#e8bc62;
      transform: translateY(-2px);
    }
    .hero-buttons .secondary {
      background:transparent;
      border:1.5px solid rgba(255,255,255,0.3);
      color:#fff;
      font-weight:400;
      padding:13px 28px;
    }
    .hero-buttons .secondary:hover {
      background: rgba(255,255,255,0.1);
      border-color: rgba(255,255,255,0.5);
    }

    /* Stats */
    .hero-stats {
      display:flex;
      flex-wrap:wrap;
      gap:20px;
      border-top:1px solid rgba(255,255,255,0.1);
      padding-top:20px;
    }
    .hero-stats div {
      margin-right:30px;
    }
    .hero-stats div h3 {
      font-family:'Montserrat',sans-serif;
      font-size:1.8rem;
      font-weight:700;
      color:#D4A853;
      margin:0;
    }
    .hero-stats div span {
      font-size:10px;
      color:rgba(255,255,255,0.45);
      text-transform:uppercase;
      letter-spacing:1.5px;
      margin-top:5px;
      display:block;
    }

    /* Responsive */
    @media (max-width:768px){
      .hero-title { font-size:clamp(2rem,6vw,3rem); }
      .hero-subtitle { font-size:0.95rem; }
      .hero-stats { flex-direction:column; gap:10px; }
    }
  </style>
</head>

<section id="home">
  <div class="hero-content">
    <div class="hero-badge">
      <span></span> Excellence médicale africaine <span></span>
    </div>

    <h1 class="hero-title">
      La santé de notre <br>
      <em>communauté</em>,<br>
      notre mission
    </h1>

    <p class="hero-subtitle">
      Une clinique moderne au cœur de l'Afrique, dédiée à vous offrir des soins de qualité supérieure, accessibles et humains.
    </p>

    <div class="hero-buttons">
      <a href="#services" class="primary">
        Nos services
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 5v14M5 12l7 7 7-7"/>
        </svg>
      </a>
      <a href="{{ route('dashboard') }}" class="secondary">Prendre rendez-vous →</a>
    </div>

    <div class="hero-stats">
      <div><h3>15+</h3><span>Années d'expérience</span></div>
      <div><h3>5 000+</h3><span>Patients pris en charge</span></div>
      <div><h3>6j/7</h3><span>Ouvert pour vous</span></div>
    </div>
  </div>
</section>

<!-- ================= ABOUT ================= -->
<section id="about" style="padding: clamp(4rem,8vw,7rem) 0; background: #fff; overflow:hidden;">
    <div class="container">

        <!-- HISTOIRE -->
        <div class="row align-items-center" style="margin-bottom: clamp(4rem,7vw,6rem);">

            <!-- VISUEL -->
            <div class="col-md-5" style="margin-bottom:2.5rem;">
                <div style="position:relative; padding: 0 1rem 2rem 0;">

                    <!-- CARD -->
                    <div style="background: linear-gradient(135deg, #083428 0%, #0D5C4A 100%);
                        border-radius: 20px;
                        padding: clamp(2rem,5vw,3rem);
                        color:#fff;
                        position:relative; overflow:hidden;">

                        <div style="position:relative;z-index:1;">
                            <div style="font-size:2.5rem;margin-bottom:10px;">
                                <i class="fa fa-hospital"></i>
                            </div>

                            <h3 style="font-family:'Playfair Display',serif;font-weight:700;">
                                Une clinique au service de <em style="color:#D4A853;">la communauté</em>
                            </h3>

                            <p style="font-size:0.9rem;color:rgba(255,255,255,0.65);line-height:1.8;">
                                Depuis plusieurs années, nous accompagnons nos patients avec une approche humaine,
                                moderne et accessible.
                            </p>
                        </div>
                    </div>

                    <!-- STAT FLOAT -->
                    <div style="position:absolute; bottom:-20px; right:-10px;
                        background:#fff;
                        border-radius:16px;
                        padding:1.1rem 1.4rem;
                        box-shadow:0 12px 40px rgba(0,0,0,0.1);
                        display:flex; align-items:center; gap:14px;">

                        <div style="width:46px;height:46px;border-radius:12px;
                            background:#EAF4F1;
                            display:flex;align-items:center;justify-content:center;">
                            <i class="fa fa-award" style="color:#0D5C4A;"></i>
                        </div>

                        <div>
                            <div style="font-size:1.6rem;font-weight:700;color:#0D5C4A;">15+</div>
                            <div style="font-size:11px;color:#6B6B85;">Années d'expérience</div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- TEXTE -->
            <div class="col-md-7">

                <h2 style="font-family:'Playfair Display',serif;">
                    Une médecine proche de vous
                </h2>

                <p style="color:#6B6B85;line-height:1.8;">
                    Notre mission est simple : offrir des soins de qualité, accessibles et humains.
                    Chaque patient est au cœur de notre engagement.
                </p>

                <!-- POINTS -->
                <div style="margin-top:20px;display:flex;flex-direction:column;gap:10px;">

                    <div style="display:flex;gap:10px;">
                        <i class="fa fa-check" style="color:#0D5C4A;"></i>
                        <span>Équipements médicaux modernes</span>
                    </div>

                    <div style="display:flex;gap:10px;">
                        <i class="fa fa-check" style="color:#0D5C4A;"></i>
                        <span>Tarifs accessibles</span>
                    </div>

                    <div style="display:flex;gap:10px;">
                        <i class="fa fa-check" style="color:#0D5C4A;"></i>
                        <span>Accueil chaleureux</span>
                    </div>

                </div>

            </div>
        </div>

        <!-- ================= TÉMOIGNAGES ================= -->
        <div class="text-center mb-5">
            <h2 style="font-family:'Playfair Display',serif;">
                Avis de nos patients
            </h2>
        </div>

        <div class="row">

            <!-- CARD -->
            <div class="col-md-4">
                <div style="background:#fff;padding:25px;border-radius:15px;box-shadow:0 10px 30px rgba(0,0,0,0.08);">

                    <!-- stars -->
                    <div style="color:#D4A853;margin-bottom:10px;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>

                    <p style="color:#666;font-style:italic;">
                        Excellent service, personnel très accueillant et professionnel.
                    </p>

                    <strong>Aminata Fall</strong>
                </div>
            </div>

            <div class="col-md-4">
                <div style="background:#0D5C4A;color:#fff;padding:25px;border-radius:15px;">

                    <div style="color:#D4A853;margin-bottom:10px;">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>

                    <p style="opacity:0.8;font-style:italic;">
                        Une clinique moderne avec un suivi impeccable.
                    </p>

                    <strong>Moussa Diallo</strong>
                </div>
            </div>

            <div class="col-md-4">
                <div style="background:#fff;padding:25px;border-radius:15px;box-shadow:0 10px 30px rgba(0,0,0,0.08);">

                    <div style="color:#D4A853;margin-bottom:10px;">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>

                    <p style="color:#666;font-style:italic;">
                        Je recommande vivement, très satisfaite des soins.
                    </p>

                    <strong>Fatou Ndiaye</strong>
                </div>
            </div>

        </div>

    </div>
</section>



<section id="services" style="padding: 80px 0; background: #f9f9f9;">
    <div class="container">
        <div class="text-center" style="margin-bottom:50px;">
            <h2>Nos Services</h2>
            <p>Découvrez nos prestations médicales</p>
        </div>

        @if($services->isEmpty())
            <p style="text-align:center;">Aucun service disponible</p>
        @else
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-4">
                    <div style="
                        background:#fff;
                        padding:25px;
                        border-radius:15px;
                        margin-bottom:20px;
                        box-shadow:0 10px 30px rgba(0,0,0,0.08);
                        transition:0.3s;
                    " onmouseover="this.style.transform='translateY(-5px)'"
                       onmouseout="this.style.transform='translateY(0)'">

                        <!-- Titre -->
                        <h4 style="color:#0D5C4A; font-weight:600;">
                            <i class="fa fa-stethoscope" style="margin-right:8px;"></i>
                            {{ $service->titre }}
                        </h4>

                        <!-- Description -->
                        <p style="color:#666; font-size:14px;">
                            {{ Str::limit($service->description, 100) }}
                        </p>

                        <!-- Médecin -->
                        @if($service->medecin)
                            <p style="font-size:13px; color:#888;">
                                <i class="fa fa-user-md" style="color:#0D5C4A; margin-right:5px;"></i>
                                Dr. {{ $service->medecin->name }}
                            </p>
                        @endif

                        <!-- Durée -->
                        <p style="font-size:13px; color:#888;">
                            <i class="fa fa-clock-o" style="color:#D4A853; margin-right:5px;"></i>
                            {{ $service->duree }} min
                        </p>

                        <!-- Prix -->
                        <p style="font-weight:bold; color:#D4A853;">
                            <i class="fa fa-money" style="margin-right:5px;"></i>
                            {{ number_format($service->prix, 0, ',', ' ') }} FCFA
                        </p>

                        <!-- Boutons -->
                        <div style="display:flex; gap:10px; margin-top:10px;">

                            <!-- Détails -->
                            <a href="{{ route('detailservice', $service->id) }}" style="
                                flex:1;
                                text-align:center;
                                border:1px solid #0D5C4A;
                                color:#0D5C4A;
                                padding:8px;
                                border-radius:8px;
                                text-decoration:none;
                            ">
                                <i class="fa fa-eye"></i> Détails
                            </a>

                            <!-- Réserver -->
                            @auth
                                @if(auth()->user()->role === 'patient')
                                    <a href="{{ route('reserver', $service->id) }}" style="
                                        flex:1;
                                        text-align:center;
                                        color:#fff;
                                        background:#0D5C4A;
                                        padding:8px;
                                        border-radius:8px;
                                        text-decoration:none;
                                    ">
                                        <i class="fa fa-calendar-plus-o"></i> Réserver
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" style="
                                    flex:1;
                                    text-align:center;
                                    color:#fff;
                                    background:#0D5C4A;
                                    padding:8px;
                                    border-radius:8px;
                                    text-decoration:none;
                                ">
                                    <i class="fa fa-sign-in"></i> Réserver
                                </a>
                            @endauth

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</section>


<!-- ================= SECTION : COMMENT RESERVER ================= -->
<section id="reservation" style="padding:100px 20px; background:#ffffff; text-align:center;">
  <div style="max-width:900px; margin:0 auto;">
    <h2 style="font-family:'Playfair Display',serif; font-size:3.5rem; font-weight:700; margin-bottom:30px; color:#D4A853;">
      Comment réserver un service ?
    </h2>
    <p style="font-family:'Lora',serif; font-size:1.5rem; color:#333333; font-weight:500; margin-bottom:60px;">
      Suivez ces étapes simples pour prendre rendez-vous avec notre clinique.
    </p>

    <div style="display:flex; flex-wrap:wrap; gap:30px; justify-content:center;">
      <!-- Step 1 -->
      <div style="flex:1 1 250px; background:#f0f4f3; padding:35px; border-radius:15px; box-shadow:0 4px 20px rgba(0,0,0,0.05);">
        <h3 style="font-family:'Playfair Display',serif; color:#08342a; font-size:1.8rem; margin-bottom:15px;">1. Consulter les services</h3>
        <p style="font-family:'Lora',serif; color:#333333; font-size:1.5rem; font-weight:500;">Découvrez tous nos services médicaux disponibles.</p>
      </div>
      <!-- Step 2 -->
      <div style="flex:1 1 250px; background:#f0f4f3; padding:35px; border-radius:15px; box-shadow:0 4px 20px rgba(0,0,0,0.05);">
        <h3 style="font-family:'Playfair Display',serif; color:#08342a; font-size:1.8rem; margin-bottom:15px;">2. Choisir un service</h3>
        <p style="font-family:'Lora',serif; color:#333333; font-size:1.5rem; font-weight:500;">Sélectionnez le service qui correspond à vos besoins.</p>
      </div>
      <!-- Step 3 -->
      <div style="flex:1 1 250px; background:#f0f4f3; padding:35px; border-radius:15px; box-shadow:0 4px 20px rgba(0,0,0,0.05);">
        <h3 style="font-family:'Playfair Display',serif; color:#08342a; font-size:1.8rem; margin-bottom:15px;">3. Créer un compte</h3>
        <p style="font-family:'Lora',serif; color:#333333; font-size:1.5rem; font-weight:500;">Inscrivez-vous pour accéder à votre espace personnel.</p>
      </div>
      <!-- Step 4 -->
      <div style="flex:1 1 250px; background:#f0f4f3; padding:35px; border-radius:15px; box-shadow:0 4px 20px rgba(0,0,0,0.05);">
        <h3 style="font-family:'Playfair Display',serif; color:#08342a; font-size:1.8rem; margin-bottom:15px;">4. Se connecter & réserver</h3>
        <p style="font-family:'Lora',serif; color:#333333; font-size:1.5rem; font-weight:500;">Choisissez un créneau disponible et confirmez votre rendez-vous.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= FOOTER ================= -->
<footer style="background:#08342a; color:#ffffff; padding:80px 20px;">
  <div style="max-width:1200px; margin:0 auto; display:flex; flex-wrap:wrap; justify-content:space-between; gap:40px;">
    <!-- Contact -->
    <div style="flex:1 1 250px;">
      <h3 style="font-family:'Playfair Display',serif; font-weight:700; margin-bottom:25px; font-size:2rem; color:#D4A853;">Clinique Africaine</h3>
      <p style="font-family:'Lora',serif; font-size:1.3rem; color:#f0f0f0; margin-bottom:10px;">123 Rue de la Santé, Dakar, Sénégal</p>
      <p style="font-family:'Lora',serif; font-size:1.3rem; color:#f0f0f0; margin-bottom:10px;">Téléphone: +221 77 123 45 67</p>
      <p style="font-family:'Lora',serif; font-size:1.3rem; color:#f0f0f0;">Email: contact@cliniqueafricaine.sn</p>
    </div>

    <!-- Liens utiles -->
    <div style="flex:1 1 200px;">
      <h4 style="font-family:'Playfair Display',serif; font-weight:700; margin-bottom:25px; font-size:1.8rem; color:#D4A853;">Liens rapides</h4>
      <ul style="list-style:none; padding:0; margin:0; font-family:'Lora',serif; font-size:1.3rem;">
        <li style="margin-bottom:12px;"><a href="#home" style="color:#ffffff; text-decoration:none;">Accueil</a></li>
        <li style="margin-bottom:12px;"><a href="#services" style="color:#ffffff; text-decoration:none;">Services</a></li>
        <li style="margin-bottom:12px;"><a href="#reservation" style="color:#ffffff; text-decoration:none;">Réserver</a></li>
        <li><a href="#contact" style="color:#ffffff; text-decoration:none;">Contact</a></li>
      </ul>
    </div>

    <!-- Réseaux sociaux -->
    <div style="flex:1 1 200px;">
      <h4 style="font-family:'Playfair Display',serif; font-weight:700; margin-bottom:25px; font-size:1.8rem; color:#D4A853;">Suivez-nous</h4>
      <div style="display:flex; gap:20px; font-size:2.5rem;">
        <a href="#" style="color:#ffffff; text-decoration:none;">&#x1F426;</a>
        <a href="#" style="color:#ffffff; text-decoration:none;">&#x1F464;</a>
        <a href="#" style="color:#ffffff; text-decoration:none;">&#x1F4F1;</a>
      </div>
    </div>
  </div>

  <div style="text-align:center; margin-top:50px; font-family:'Lora',serif; font-size:1.2rem; color:rgba(255,255,255,0.9);">
    &copy; 2026 Clinique Africaine. Tous droits réservés.
  </div>
</footer>
