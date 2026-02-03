@extends('layouts.dashadmin');
@section('contenu');
<button type="button"
    class="btn btn-success mb-3"
    data-bs-toggle="modal"
    data-bs-target="#addMedecinModal">
    Ajouter un medecin
</button>
<div class="container">
    <h2 class="mb-4">Liste des Médecins</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medecins as $medecin)
            <tr>
                <td>{{ $medecin->name }}</td>

                <td>{{ $medecin->email }}</td>
                <td>
                    <!-- Bouton Modifier -->
                    <a href="{{ route('vuemedecin.edit',$medecin->id )}}" class="btn btn-sm btn-primary">
                        Modifier
                    </a>

                    <!-- Bouton Supprimer -->
                    <form action="" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Voulez-vous vraiment supprimer ce médecin ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<div class="modal fade" id="addMedecinModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Créer un medecin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('vuemedecin.store') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nom du medecin</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <textarea name="email" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="text" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rôle</label>
                        <select name="role" class="form-control" required>
                            <option value="">-- Sélectionner un rôle --</option>
                            <option value="medecin">Médecin</option>
                            <option value="patient">Patient</option>
                            <option value="patient">admin</option>
                        </select>
                    </div>
                  

                    <!-- <div class="mb-3">
                        <label class="form-label">Médecin</label>
                        <select name="medecin_id" class="form-select" required>
                            <option value="">Sélectionner un médecin</option>
                            @foreach($medecins as $medecin)
                            <option value="{{ $medecin->id }}">
                                {{ $medecin->name }}
                            </option>
                            @endforeach
                        </select>
                    </div> -->

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