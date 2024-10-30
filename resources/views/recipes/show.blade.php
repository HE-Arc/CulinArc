@extends('layout.app')

@section('content')

<div class="row mb-3">
    <div class="col-12">
        <a class="btn btn-primary" href="/recipes"> Retour</a>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-6 offset-lg-3">
        <div class="card">
            <div class="card-header">
                Recette n°{{ $recipe->id }}
            </div>
            <div class="card-body">
                <div class="form-group">
                    <strong>Nom de la recette :</strong>
                    {{ $recipe->title }}
                </div>
                <div class="form-group">
                    <strong>Difficulté :</strong>
                    {{ $recipe->difficulty }}
                </div>
                <div class="form-group">
                    <strong>Temps de préparation :</strong>
                    {{ $recipe->preparation_time }} minutes
                </div>
                <div class="form-group">
                    <strong>Temps de cuisson :</strong>
                    {{ $recipe->preparation }} minutes
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
