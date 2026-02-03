@extends('layouts.dashpatient')

@section('contenu')
<h1 class="mb-4">Services disponibles</h1>

<div class="row g-3">
    @foreach($services as $service)
        <div class="col-md-4">
            <div class="card p-3 shadow h-100">
                <h5 class="card-title">{{ $service->titre }}</h5>
                <p class="card-text">{{ Str::limit($service->description, 100, '...') }}</p>
                <p class="card-text"><strong>Prix :</strong> {{ $service->prix }} FCFA</p>
                <p class="card-text"><strong>Médecin :</strong> {{ $service->medecin->name ?? 'Non attribué' }}</p>

                <a href="{{ route('detailservice', $service->id) }}" class="btn btn-primary btn-sm mt-2 w-100">
                    Voir plus
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection
