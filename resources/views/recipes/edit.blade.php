@extends('layout.app')

@section('content')

<div class="row mb-3">
    <div class="col-12">
        <a class="btn btn-primary" href="{{ route('recipes.index') }}">Retour à la recette</a>
    </div>
</div>

<form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="card col-12 col-lg-6 offset-0 offset-lg-3">
        <div class="card-header">
            Modifier une recette
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputTitle">Nom de la recette</label>
                    <input type="text" name="title" class="form-control" id="inputTitle" value="{{ old('title', $recipe->title) }}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-12">
                    <label for="inputImage">Image</label>
                    <input type="file" name="image" class="form-control-file" id="inputImage">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-12">
                    <label for="inputPreparationTime">Temps de préparation (en minutes)</label>
                    <input type="number" name="preparation_time" class="form-control" id="inputPreparationTime" value="{{ old('preparation_time', $recipe->preparation_time) }}">
                    @error('preparation_time')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-12">
                    <label for="inputDifficulty">Difficulté</label>
                    <select name="difficulty" class="form-control" id="inputDifficulty">
                        <option value="1" {{ $recipe->difficulty == '1' ? 'selected' : '' }}>Facile</option>
                        <option value="2" {{ $recipe->difficulty == '2' ? 'selected' : '' }}>Moyen</option>
                        <option value="3" {{ $recipe->difficulty == '3' ? 'selected' : '' }}>Difficile</option>
                    </select>
                    @error('difficulty')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-12">
                    <label for="inputType">Type de plat</label>
                    <select name="type" class="form-control" id="inputType">
                        <option value="1" {{ $recipe->type == '1' ? 'selected' : '' }}>Soupe</option>
                        <option value="2" {{ $recipe->type == '2' ? 'selected' : '' }}>Plat principal</option>
                        <option value="3" {{ $recipe->type == '3' ? 'selected' : '' }}>Dessert</option>
                        <option value="4" {{ $recipe->type == '4' ? 'selected' : '' }}>Divers</option>
                    </select>
                    @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-12">
                    <label for="ingredients">Ingrédients</label>
                    <div id="ingredients-list">
                        @foreach ($recipe->ingredients as $index => $ingredient)
                            <div class="ingredient-row mb-2" data-index="{{ $index }}">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <select name="ingredients[{{ $index }}][id]" class="form-control w-75">
                                        @foreach ($ingredients as $option)
                                            <option value="{{ $option->id }}" {{ $option->id == $ingredient->id ? 'selected' : '' }}>
                                                {{ $option->name }} ({{ $option->getUnitAttribute() }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="number" name="ingredients[{{ $index }}][quantity]" class="form-control w-25 ml-2" placeholder="Quantité" value="{{ $ingredient->pivot->quantity }}" min="0">
                                </div>
                                <button type="button" class="btn btn-danger remove-ingredient" data-index="{{ $index }}">Supprimer</button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-ingredient" class="btn btn-secondary w-100">Ajouter un ingrédient</button>
                </div>

                <div class="form-group col-12">
                    <div id="preparation-steps">
                        <label for="inputPreparation">Étapes de préparation</label>
                        @foreach ($recipe->preparation as $index => $step)
                            <div class="step mb-2" data-index="{{ $index }}">
                                <input type="text" name="preparation[{{ $index }}][action]" value="{{ $step['action'] }}" class="form-control mb-2">
                                <button type="button" class="btn btn-danger remove-step" data-index="{{ $index }}">Supprimer</button></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <button type="button" id="add-step" class="btn btn-secondary mt-2">Ajouter une étape</button>
            <button type="submit" class="btn btn-primary mt-3">Enregistrer les modifications</button>
        </div>
    </div>
</form>

@endsection

@push('scripts')
    <script src="{{ asset('js/dynamic-steps.js') }}"></script>
    <script src="{{ asset('js/dynamic-ingredients.js') }}"></script>
@endpush
