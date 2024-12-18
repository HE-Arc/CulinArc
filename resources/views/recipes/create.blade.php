@extends('layout.app')

@section('content')

<div class="row mb-3">
    <div class="col-12">
        <a class="btn btn-primary" href="{{ route('recipes.index') }}">Retour aux recettes</a>
    </div>
</div>

<form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card">
                <div class="card-header">
                    Créer une nouvelle recette
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <!-- Nom de la recette -->
                        <div class="form-group col-12">
                            <label for="inputTitle">Nom de la recette</label>
                            <input type="text" name="title" class="form-control" id="inputTitle" value="{{ old('title') }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="form-group col-12">
                            <label for="inputImage">Image</label>
                            <input type="file" name="image" class="form-control-file" id="inputImage">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Temps de préparation -->
                        <div class="form-group col-12">
                            <label for="inputPreparationTime">Temps de préparation (en minutes)</label>
                            <input type="number" name="preparation_time" class="form-control" id="inputPreparationTime" value="{{ old('preparation_time') }}">
                            @error('preparation_time')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Difficulté -->
                        <div class="form-group col-12">
                            <label for="inputDifficulty">Difficulté</label>
                            <select name="difficulty" class="form-control" id="inputDifficulty">
                                <option value="1" {{ old('difficulty') == '1' ? 'selected' : '' }}>Facile</option>
                                <option value="2" {{ old('difficulty') == '2' ? 'selected' : '' }}>Moyen</option>
                                <option value="3" {{ old('difficulty') == '3' ? 'selected' : '' }}>Difficile</option>
                            </select>
                            @error('difficulty')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Type de plat -->
                        <div class="form-group col-12">
                            <label for="inputType">Type de plat</label>
                            <select name="type" class="form-control" id="inputType">
                                <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>Entrée</option>
                                <option value="2" {{ old('type') == '2' ? 'selected' : '' }}>Plat</option>
                                <option value="3" {{ old('type') == '3' ? 'selected' : '' }}>Dessert</option>
                                <option value="4" {{ old('type') == '4' ? 'selected' : '' }}>Divers</option>
                            </select>
                            @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Liste des ingrédients -->
                        <div class="form-group col-12">
                            <label for="ingredients">Ingrédients</label>
                            <div id="ingredients-list">
                                <div class="ingredient-row mb-2">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <select name="ingredients[0][id]" class="form-control w-75">
                                            @foreach ($ingredients as $ingredient)
                                                <option value="{{ $ingredient->id }}">{{ $ingredient->name }} ({{ $ingredient->getUnitAttribute() }})</option>
                                            @endforeach
                                        </select>
                                        <input type="number" name="ingredients[0][quantity]" class="form-control w-25 ml-2" placeholder="Quantité" min="0">
                                    </div>
                                    <button type="button" class="btn btn-danger remove-ingredient">Supprimer</button>
                                </div>
                            </div>
                            <button type="button" id="add-ingredient" class="btn btn-secondary w-100">Ajouter un ingrédient</button>
                        </div>

                        <!-- Étapes de préparation -->
                        <div class="form-group col-12">
                            <label for="inputPreparation">Étapes de préparation</label>
                            <div id="preparation-steps">
                                <div class="step mb-2">
                                    <input type="text" name="preparation[0][action]" class="form-control mb-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary mt-2" id="add-step">Ajouter une étape</button>
                    <button type="submit" class="btn btn-primary mt-3">Créer</button>
                </div>
            </div>
        </div>
    </div>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection

@push('scripts')
    <script src="{{ asset('js/dynamic-steps.js') }}"></script>
    <script src="{{ asset('js/dynamic-ingredients.js') }}"></script>
@endpush
