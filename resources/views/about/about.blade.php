@extends('layout.app')

@section('content')
<div class="container mt-5 mb-5">
    <!-- Titre principal -->
    <div class="text-center mb-4">
        <h1 class="display-4 font-weight-bold">À propos de CULINARC</h1>
        <hr class="w-25 mx-auto">
    </div>

    <!-- Introduction -->
    <div class="mb-5">
        <p class="lead text-center">
            Bienvenue sur <strong>CULINARC</strong>, votre plateforme dédiée à la découverte et au partage de recettes de cuisine !
        </p>
    </div>

    <!-- Section présentations -->
    <div class="row mb-5">
        <div class="col-md-6">
            <img src="{{ asset('images/home.jpg') }}" alt="Cuisine" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <div>
                <h2 class="h4 mb-3">Une plateforme intuitive et accessible</h2>
                <p>
                    CulinArc propose des recettes de cuisine soigneusement organisées par catégories : <em>entrées</em>, <em>plats</em>, <em>desserts</em> et <em>divers</em>.
                    Notre objectif est de vous simplifier la recherche, la gestion et le partage de recettes.
                </p>
                    Vous pouvez également <strong>ajouter des recettes en favoris</strong> pour les retrouver facilement plus tard et ne jamais manquer vos plats préférés !
                </p>
            </div>
        </div>
    </div>

    <!-- Équipe et crédits -->
    <div class="text-center">
     <p>Notre équipe</p>

    <p class="mb-1"><strong>Marilyn Teuscher</strong></p>
    <p class="mb-1"><strong>Bryan Dos Santos</strong></p>
    <p class="mb-3"><strong>Nicolas Magnin</strong></p>
    <p class="small text-muted">
        © 2024 <img src="{{ asset('images/culinarc_transp.png') }}" alt="Logo CulinArc" class="img-fluid mb-3" style="width: 100px; height: auto;">. Tous droits réservés.
    </p>
</div>

@endsection
