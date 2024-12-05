@extends('layout.app')

@section('content')
<div class="container">
    <!-- Header Section -->
    <div class="text-center my-5">
        <div class="container">
            <!-- Container for image, text, and button -->
            <div class="container-spe">
                <img src="{{ asset('images/home.jpg') }}" alt="Home image">

                <!-- Text and Button Overlaid on Image -->
                <div class="overlay-text">
                    <h2>Des recettes faciles et rapides</h2>
                    <a href="{{ route('recipes.index', array_merge(request()->except('page'), ['time' => '5-15', 'difficulty' => 'Facile'])) }}" class="btn btn-primary mb-2">Show now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="d-flex align-items-center mb-4">

        <!-- Reset Filters Button -->
        @if (request()->hasAny(['type', 'difficulty', 'time']))
            <div class="mr-auto">
                <a href="{{ route('recipes.index', array_merge(request()->except(['type', 'difficulty', 'time']), ['page' => request()->get('page')])) }}" class="btn btn-danger text-nowrap mx-1">Réinitialiser les filtres</a>
            </div>
        @endif

        <!-- Filters Section (aligned to the right) -->
        <div class="d-flex justify-content-end w-100">
            <!-- Category Filter -->
            <div class="dropdown mx-1">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                    {{ request()->get('type') ? request()->get('type') : 'Catégorie' }}
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('recipes.index', array_merge(request()->except('page'), ['type' => 'Entrée'])) }}">Entrée</a>
                    <a class="dropdown-item" href="{{ route('recipes.index', array_merge(request()->except('page'), ['type' => 'Plat'])) }}">Plat</a>
                    <a class="dropdown-item" href="{{ route('recipes.index', array_merge(request()->except('page'), ['type' => 'Dessert'])) }}">Dessert</a>
                    <a class="dropdown-item" href="{{ route('recipes.index', array_merge(request()->except('page'), ['type' => 'Divers'])) }}">Divers</a>
                </div>
            </div>

            <!-- Time Filter -->
            <div class="dropdown mx-1">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                    {{ request()->get('time') ? request()->get('time') : 'Temps de préparation' }}
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('recipes.index', array_merge(request()->except('page'), ['time' => '5-15'])) }}">5-15 min</a>
                    <a class="dropdown-item" href="{{ route('recipes.index', array_merge(request()->except('page'), ['time' => '15-30'])) }}">15-30 min</a>
                    <a class="dropdown-item" href="{{ route('recipes.index', array_merge(request()->except('page'), ['time' => '30+'])) }}">30 min et plus</a>
                </div>
            </div>

            <!-- Difficulty Filter -->
            <div class="dropdown mx-1">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                    {{ request()->get('difficulty') ? request()->get('difficulty') : 'Difficulté' }}
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('recipes.index', array_merge(request()->except('page'), ['difficulty' => 'Facile'])) }}">Facile</a>
                    <a class="dropdown-item" href="{{ route('recipes.index', array_merge(request()->except('page'), ['difficulty' => 'Moyen'])) }}">Moyen</a>
                    <a class="dropdown-item" href="{{ route('recipes.index', array_merge(request()->except('page'), ['difficulty' => 'Difficile'])) }}">Difficile</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recipes Grid Section -->
    <div class="row">
        @if($recipes->isEmpty())
            <div class="col-12 text-center">
                <p>Aucune recette ne correspond à vos critères. Essayez d'ajuster les filtres.</p>
            </div>
        @else
            @foreach($recipes as $recipe)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('recipes.show', $recipe->id) }}" class="text-decoration-none">
                        <div class="card h-100">
                            @if($recipe->image)
                                <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" alt="{{ $recipe->title }}">
                            @else
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Default image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title text-dark">{{ $recipe->title }}</h5>
                                <p class="card-text">
                                    <span class="badge badge-info">{{ $recipe->difficulty }}</span>
                                    <span class="badge badge-info">{{ $recipe->type }}</span>
                                    <span class="badge badge-info">{{ $recipe->preparation_time }} min</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{ $recipes->appends(request()->except('page'))->links() }}
</div>

@endsection
