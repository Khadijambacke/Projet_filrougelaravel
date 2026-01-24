@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Nos services médicaux</h1>

    @if($services->isEmpty())
        <p>Aucun service disponible.</p>
    @else
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $service->nom }}</h5>
                            <p class="card-text">
                                {{ Str::limit($service->description, 100) }}
                            </p>
                            <p><strong>Prix :</strong> {{ $service->prix }} FCFA</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
