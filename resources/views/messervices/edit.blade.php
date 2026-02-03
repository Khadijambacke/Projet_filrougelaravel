@extends('layouts.dashadmin')

@section('contenu')
<h2>Modifier le service</h2>

<form action="{{ route('updateservice', $service->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nom du service</label>
        <input type="text" name="titre" class="form-control" value="{{ $service->titre }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3">{{ $service->description }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Prix</label>
        <input type="number" name="prix" class="form-control" value="{{ $service->prix }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Durée</label>
        <input type="text" name="duree" class="form-control" value="{{ $service->duree }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Statut</label>
        <input type="text" name="statut" class="form-control" value="{{ $service->statut }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Médecin</label>
        <select name="medecin_id" class="form-select" required>
            @foreach($medecins as $medecin)
                <option value="{{ $medecin->id }}" 
                    {{ $medecin->id == $service->medecin_id ? 'selected' : '' }}>
                    {{ $medecin->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Enregistrer</button>
</form>
@endsection
