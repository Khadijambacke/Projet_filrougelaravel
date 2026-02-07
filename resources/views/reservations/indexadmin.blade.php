@extends('layouts.dashadmin')

@section('contenu')
<div class="container mt-4">
    <h2 class="mb-4">Gestion des réservations</h2>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>Client</th>
                <th>Service</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $res)
            <tr>
                <td>{{ $res->user->name }}</td>
                <td>{{ $res->service->titre }}</td>
                <td>{{ $res->date_reservation }}</td>
                <td>{{ $res->heure_reservation }}</td>
                <td>
                    <span class="badge bg-secondary">
                        {{ ucfirst($res->statut) }}
                    </span>
                </td>
                <td>
                    <form method="POST"
                          action="{{ route('reservationsnadmin.update', $res) }}">
                        @csrf
                        @method('PUT') 
    
                        <select name="statut" class="form-select form-select-sm">
                    
                            <option value="en_attente" @selected($res->statut=='en_attente')>En attente</option>
                            <option value="confirmee" @selected($res->statut=='confirmee')>Confirmée</option>
                            <option value="annulee" @selected($res->statut=='annulee')>Annulée</option>
                            <option value="effectuee" @selected($res->statut=='effectuee')>Effectuée</option>
                        </select>

                        <button class="btn btn-sm btn-primary mt-2">
                            Mettre à jour
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
