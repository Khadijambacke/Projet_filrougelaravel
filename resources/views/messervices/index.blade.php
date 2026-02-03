@extends(auth()->user()->role === 'admin'
    ? 'layouts.dashadmin'
    : 'layouts.dashpatient')

@section('contenu')
<h1>Services disponibles</h1>
<div class="row g-3">
    @foreach($services as $service)
        <div class="col-md-4">
            <div class="card p-3 shadow">
                <h5 class="card-title">{{ $service->titre }}</h5>
                <p class="card-text">{{ Str::limit($service->description, 100) }}</p>
                <p class="card-text">Prix : {{ $service->prix }} FCFA</p>
                <p>Médecin : {{ $service->medecin->name ?? 'Non attribué' }}</p>
                  <a href="" class="btn btn-primary btn-sm">Voir plus</a>
            </div>
<!-- apparition dun modifier et suprimmer suivaant le role -->
            @if(Auth::user()->role === 'admin')
            <a href="" class="btn btn-warning btn-sm">
                Modifier
            </a>
            <form action="" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    Supprimer
                </button>
            </form>
        @endif
        </div>               
      
    @endforeach
</div>
@endsection
