@extends('layouts.dashmedecin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Mes Consultations</h1>

    @if($reservations->isEmpty())
        <p class="text-gray-500">Vous n'avez aucune consultation pour le moment.</p>
    @else
        @php
            // Mapping des statuts vers les classes Bootstrap
            $statusColors = [
                'en_attente' => 'warning',
                'annulee' => 'danger',
                'confirmee' => 'primary',
                'effectuee' => 'success',
            ];
        @endphp

        <div class="row g-4">
            @foreach($reservations as $res)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100 border-start border-4 border-{{ $statusColors[$res->statut] }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $res->service->name }}</h5>
                            <p class="card-text mb-1"><strong>Patient :</strong> {{ $res->patient->name }}</p>
                            <p class="card-text mb-1"><strong>Date :</strong> {{ $res->date_reservation }}</p>
                            <p class="card-text mb-1"><strong>Heure :</strong> {{ $res->heure_reservation }}</p>
                            @if($res->commentaire)
                                <p class="card-text"><strong>Commentaire :</strong> {{ $res->commentaire }}</p>
                            @endif

                            <!-- Formulaire pour changer le statut -->
                            <div class="mt-auto">
                                <form action="{{ route('medecin.reservation.update', $res->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="d-flex align-items-center">
                                        <select name="statut" class="form-select form-select-sm me-2">
                                            <option value="confirmee" {{ $res->statut == 'confirmee' ? 'selected' : '' }}>Confirmée</option>
                                            <option value="effectuee" {{ $res->statut == 'effectuee' ? 'selected' : '' }}>Effectuée</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-primary">Mettre à jour</button>
                                    </div>
                                </form>
                                <span class="badge bg-{{ $statusColors[$res->statut] }} mt-2 d-inline-block">
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
