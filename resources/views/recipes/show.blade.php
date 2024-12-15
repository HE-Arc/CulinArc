@extends('layout.app')

@section('content')

<div class="row">
    <div class="col-12 col-lg-8 offset-lg-2">
        <!-- Section pour l'image -->
        <div class="text-center mb-4">
            @if ($recipe->image)
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="img-fluid rounded">
            @else
                <img src="https://via.placeholder.com/150" alt="Image par défaut" class="img-fluid rounded">
            @endif
        </div>

        <!-- Centrer les ingrédients au milieu de la page -->
        <div class="d-flex flex-column align-items-center justify-content-center my-4">
            @if ($recipe->ingredients->isNotEmpty())
                <div class="form-group text-center">
                    <h3>Ingrédients :</h3>
                    <ul class="list-unstyled">
                        @foreach ($recipe->ingredients as $ingredient)
                            <li>{{ $ingredient->name }} - {{ $ingredient->pivot->quantity }} {{ $ingredient->getUnitAttribute() }}</li>
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
                <!-- Favorite button -->
                @if (Auth::check())
                    <form id="favorite-form" action="{{ route('recipes.favorite', $recipe->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="button" class="btn btn-link p-0" onclick="toggleFavorite()">
                            <i id="favorite-icon" class="bi bi-star{{ $recipe->isFavorite(Auth::user()->id) ? '-fill' : '' }}"></i>
                        </button>
                    </form>
                @endif
            </div>
            <div class="card-body">
            <!-- Admin only update button -->
            @if (Auth::check() && Auth::user()->is_admin === 1)
            <div class="text-end mb-3">
                <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a>
                <button class="btn btn-danger" onclick="deleteRecipe()">
                    <i class="bi bi-trash-fill"></i>
                </button>

                <form id="delete-recipe-form" action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" style="display: none;">
                     @csrf
                     @method('DELETE')
                </form>
            </div>
            @endif
                <div class="form-group mb-3">
                    <strong>Difficulté :</strong> {{ $recipe->difficulty }}
                </div>
                <div class="form-group mb-3">
                    <strong>Temps de préparation :</strong> {{ $recipe->preparation_time }} minutes
                </div>

                <div class="form-group">
                    <strong>Étapes de préparation :</strong>
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

<script src="{{ asset('js/recipe-delete.js') }}"></script>
<script src="{{ asset('js/recipe-favorite.js') }}"></script>

@endsection
