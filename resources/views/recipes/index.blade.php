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
                    <a href="{{ route('recipes.create') }}" class="btn btn-primary mb-2">Show now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="d-flex justify-content-end align-items-center mb-4">
        <div class="dropdown mx-1">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                Catégorie
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Entrée</a>
                <a class="dropdown-item" href="#">Plat</a>
                <a class="dropdown-item" href="#">Dessert</a>
                <a class="dropdown-item" href="#">Divers</a>
            </div>
        </div>

        <div class="dropdown mx-1">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                Temps de préparation
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">5-15 min</a>
                <a class="dropdown-item" href="#">15-30 min</a>
                <a class="dropdown-item" href="#">30 min et plus</a>
            </div>
        </div>

        <div class="dropdown mx-1">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                Difficulté
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Facile</a>
                <a class="dropdown-item" href="#">Moyen</a>
                <a class="dropdown-item" href="#">Difficile</a>
            </div>
        </div>
    </div>

    <!-- Recipes Grid Section -->
    <div class="row">
        @foreach($recipes as $recipe)
            <div class="col-md-4 mb-4">
                <a href="{{ route('recipes.show', $recipe->id) }}" class="text-decoration-none">
                    <div class="card h-100">
                        <!-- Recipe image -->
                        @if($recipe->image)
                            <img src="{{ asset($recipe->image) }}" class="card-img-top" alt="{{ $recipe->title }}">
                        @else
                            <!-- TODO : Securtiy -->
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Default image">
                        @endif

                        <div class="card-body">
                            <!-- Recipe title -->
                            <h5 class="card-title text-dark">{{ $recipe->title }}</h5>

                            <!-- Recipe information -->
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
    </div>
</div>
@endsection
