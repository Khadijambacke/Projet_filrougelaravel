@extends('layouts.dashpatient')

@section('contenu')
<div class="container">
    <h2>{{ $service->titre }}</h2>
    <p>{{ $service->description_longue ?? $service->description }}</p>

    @if($service->images)
        <div class="row g-2">
        @foreach($service->images as $img)
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $img) }}" class="img-fluid mb-2">
            </div>
        @endforeach
        </div>
    @endif

    <p><strong>Durée :</strong> {{ $service->duree }}</p>
    <p><strong>Prix :</strong> {{ $service->prix }} FCFA</p>
    <p>Médecin : {{ $service->medecin->name ?? 'Non attribué' }}</p>

    <a href="{{ route('servicspatient') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection