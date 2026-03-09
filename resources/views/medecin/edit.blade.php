@extends('layouts.dashadmin')

@section('contenu')
<div class="container">

    <h4 class="mb-4">Modifier le médecin</h4>

    <form action="{{ route('vuemedecin.update', $medecin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nom du médecin</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $medecin->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email', $medecin->email) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nouveau mot de passe (optionnel)</label>
            <input type="password" name="password" class="form-control"
            value="{{ old('password', $medecin->password) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rôle</label>
            <select name="role" class="form-control" required>
                <option value="medecin" {{ $medecin->role == 'medecin' ? 'selected' : '' }}>Médecin</option>
                <option value="patient" {{ $medecin->role == 'patient' ? 'selected' : '' }}>Patient</option>
                <option value="admin" {{ $medecin->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                Mettre à jour
            </button>
            <a href="{{ route('vuemedecin.index') }}" class="btn btn-secondary">
                Retour
            </a>
        </div>

    </form>
</div>
@endsection
