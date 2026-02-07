@extends('layouts.dashpatient')

@section('contenu')
<div class="container">

    <h2 class="mb-4">Réserver un service</h2>

    {{-- Infos du service --}}
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $service->nom }}</h5>
            <p class="card-text">
                {{ $service->description ?? 'Aucune description disponible.' }}
            </p>
        </div>
    </div>

    {{-- Messages d’erreur --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('storereservations', $service->id) }}" method="POST">
        @csrf

        <!-- {{-- service_id caché --}}
        <input type="hidden" name="service_id" value="{{ $service->id }}"> -->
        <div class="mb-3">
            <label for="date_reservation" class="form-label">
                Date de réservation
            </label>
            <input
                type="date"
                class="form-control"
                name="date_reservation"
                required
                min="{{ date('Y-m-d') }}"
            >
        </div>
        <div class="mb-3">
            <label for="heure_reservation" class="form-label">
                Heure de réservation
            </label>
            <input
                type="time"
                class="form-control"
                name="heure_reservation"
                required
            >
        </div>
        <div class="mb-3">
            <label for="commentaire" class="form-label">
                Commentaire (optionnel)
            </label>
            <textarea
                name="commentaire"
                class="form-control"
                rows="3"
                placeholder="Ex : douleur, urgence, précision..."
            ></textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                Confirmer la réservation
            </button>

            <a href="{{ route('servicspatient') }}" class="btn btn-secondary">
                Annuler
            </a>
        </div>

    </form>

</div>
@endsection
