<!-- Bouton Edit -->
<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editServiceModal{{ $service->id }}">
    Modifier
</button>

<!-- Modal Edit -->
<div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('updateservice', $service->id) }}" method="POST">
                @csrf
                

                <div class="modal-header">
                    <h5 class="modal-title">Modifier le service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nom du service</label>
                        <input type="text" name="titre" class="form-control" value="{{ $service->titre }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control">{{ $service->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Prix</label>
                        <input type="number" name="prix" class="form-control" value="{{ $service->prix }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Statut</label>
                        <select name="statut" class="form-select">
                            <option value="actif" {{ $service->statut == 'actif' ? 'selected' : '' }}>Actif</option>
                            <option value="inactif" {{ $service->statut == 'inactif' ? 'selected' : '' }}>Inactif</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Médecin</label>
                        <select name="medecin_id" class="form-select">
                            @foreach($medecins as $medecin)
                                <option value="{{ $medecin->id }}" {{ $service->medecin_id == $medecin->id ? 'selected' : '' }}>
                                    {{ $medecin->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>

            </form>
        </div>
    </div>
</div>
