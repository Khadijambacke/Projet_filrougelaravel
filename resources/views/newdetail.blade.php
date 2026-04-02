<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $service->titre }} - Clinique Africaine</title>
    <link rel="stylesheet" href="{{ asset('assetpatient/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetpatient/css/tooplate-style.css') }}">
</head>
<body>

<!-- Header (copié de ta page principale) -->
@include('partials.header')

<!-- DETAIL SERVICE -->
<section style="padding:80px 0; background:#f9f9f9;">
    <div class="container">

        <h2 style="color:#0D5C4A; margin-bottom:20px;">{{ $service->titre }}</h2>

        <p style="color:#555; font-size:1.2rem; line-height:1.8;">
            {{ $service->description_longue ?? $service->description }}
        </p>

        <!-- Images du service -->
        @if($service->images)
            <div class="row g-3 mb-4">
                @foreach($service->images as $img)
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('storage/' . $img['path']) }}" class="img-fluid rounded shadow-sm">
                        @if(!empty($img['legende']))
                            <p style="color:#08342a; margin-top:5px;">{{ $img['legende'] }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        <p style="font-weight:600; color:#0D5C4A;">
            Médecin : {{ $service->medecin->name ?? 'Non attribué' }} <br>
            Durée : {{ $service->duree }} min <br>
            Prix : {{ number_format($service->prix,0,',',' ') }} FCFA
        </p>

        <!-- Boutons -->
        <div style="display:flex; gap:15px; margin-top:30px;">
            <a href="{{ route('services') }}" class="btn btn-outline-primary">← Retour aux services</a>
            
            @auth
                @if(auth()->user()->role === 'patient')
                    <a href="{{ route('reserver', $service->id) }}" class="btn btn-primary">Réserver ce service</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Réserver ce service</a>
            @endauth
        </div>

    </div>
</section>

<!-- Footer (copié de ta page principale) -->
@include('partials.footer')

</body>
</html>
