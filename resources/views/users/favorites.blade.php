@extends('layout.app')

@section('content')
<div class="container">
    <!-- Header Section -->
    <div class="text-center my-5">
        <h2>Mes Favoris</h2>
    </div>

    <!-- Recipes Grid Section -->
    <div class="row">
        @if($recipes->isEmpty())
            <div class="col-12 text-center">
                <p>Aucune recette favorite pour le moment.</p>
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

@endsection
