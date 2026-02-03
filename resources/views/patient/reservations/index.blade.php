@extends('layouts.dashpatient')

@section('contenu')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Mes Réservations</h1>

    @if($reservations->isEmpty())
        <p class="text-gray-500">Vous n'avez aucune réservation pour le moment.</p>
    @else
        @php
            // Mapping des statuts vers les classes Bootstrap
            $statusColors = [
                'en_attente' => 'warning',
                'reserve' => 'primary',
                'termine' => 'success',
            ];
        @endphp

        <div class="row g-4">
            @foreach($reservations as $res)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100 border-start border-4 border-{{ $statusColors[$res->statut] }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $res->service->name }}</h5>
                            <p class="card-text mb-1"><strong>Date :</strong> {{ $res->date_reservation }}</p>
                            <p class="card-text mb-1"><strong>Heure :</strong> {{ $res->heure_reservation }}</p>
                            @if($res->commentaire)
                                <p class="card-text"><strong>Commentaire :</strong> {{ $res->commentaire }}</p>
                            @endif
                            <div class="mt-auto">
                                <span class="badge bg-{{ $statusColors[$res->statut] }}">
                                    {{ ucfirst($res->statut) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
