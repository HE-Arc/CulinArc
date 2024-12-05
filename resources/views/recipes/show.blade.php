@extends('layout.app')

@section('content')

<div class="row">
    <div class="col-12 col-lg-8 offset-lg-2">
        <!-- Section pour l'image -->
        <div class="text-center mb-4">
            @if ($recipe->image)
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="img-fluid rounded">
            @else
                <img src="{{ asset('default-image.jpg') }}" alt="Image par défaut" class="img-fluid rounded">
            @endif
        </div>

        <!-- Centrer les ingrédients au milieu de la page -->
        <div class="d-flex flex-column align-items-center justify-content-center my-4">
            @if ($recipe->ingredients->isNotEmpty())
                <div class="form-group text-center">
                    <h3>Ingrédients :</h3>
                    <ul class="list-unstyled">
                        @foreach ($recipe->ingredients as $ingredient)
                            <li>{{ $ingredient->name }} - {{ $ingredient->pivot->quantity }}</li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="form-group text-center">
                    <p>Aucun ingrédient disponible pour cette recette.</p>
                </div>
            @endif
        </div>

        <!-- Section pour la carte -->
        <div class="card">
            <div class="card-header text-center">
                <h2>Recette n°{{ $recipe->id }} - {{ $recipe->title }}</h2>
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <strong>Difficulté :</strong> {{ $recipe->difficulty }}
                </div>
                <div class="form-group mb-3">
                    <strong>Temps de préparation :</strong> {{ $recipe->preparation_time }} minutes
                </div>

                <div class="form-group">
                    <strong>Étapes de cuisson :</strong>
                    @if (!empty($recipe->preparation) && is_array($recipe->preparation))
                        <ol>
                            @foreach ($recipe->preparation as $step)
                                <li>{{ $step['action'] }}</li>
                            @endforeach
                        </ol>
                    @else
                        <p>Aucune étape disponible.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
