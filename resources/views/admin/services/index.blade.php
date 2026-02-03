@extends('layouts.dashadmin')
@section('contenu')
<h2>Services</h2>
<button type="button"
    class="btn btn-success mb-3"
    data-bs-toggle="modal"
    data-bs-target="#addServiceModal">
    Ajouter un service
</button>

<div class="row">
    @foreach($services as $service)
    <div class="col-md-4">
        <div class="card p-3 mb-3">

            <h5>{{ $service->titre }}</h5>
            <p>{{ Str::limit($service->description, 100) }}</p>
            <p>Prix : {{ $service->prix }} FCFA</p>
            <p>Médecin : {{ $service->medecin->name ?? 'Non attribué' }}</p>

            <a href="{{ route('servicedetails', $service->id)}}"
                class="btn btn-primary btn-sm">
                Voir plus
            </a>

            <a href="{{ route('editservice', $service->id) }}"
                class="btn btn-warning btn-sm mt-2">
                Modifier
            </a>

            <form action="{{ route('deleteservice', $service->id) }}"
                method="POST" class="d-inline mt-2">
                @csrf
                <button class="btn btn-danger btn-sm">
                    Supprimer
                </button>
            </form>

        </div>
    </div>
    @endforeach
</div>
@endsection
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Créer un service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('storeservice') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nom du service</label>
                        <input type="text" name="titre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Prix</label>
                        <input type="number" name="prix" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Durée</label>
                        <input type="text" name="duree" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Statut</label>
                        <select name="statut" class="form-select">
                            <option value="actif">Actif</option>
                            <option value="inactif">Inactif</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Médecin</label>
                        <select name="medecin_id" class="form-select" required>
                            <option value="">Sélectionner un médecin</option>
                            @foreach($medecins as $medecin)
                                <option value="{{ $medecin->id }}">
                                    {{ $medecin->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-success">
                        Enregistrer
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
