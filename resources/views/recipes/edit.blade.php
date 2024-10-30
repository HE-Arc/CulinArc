@extends('layout.app')

@section('content')

<div class="row mb-3">
    <div class="col-12">
        <a class="btn btn-primary" href="{{ route('recipes.index') }}">Retour aux recettes</a>
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
                    <label for="inputPreparation">Préparation (format JSON)</label>
                    <textarea name="preparation" class="form-control" id="inputPreparation" rows="4">{{ old('preparation', $recipe->preparation) }}</textarea>
                    @error('preparation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">Modifier</button>
            </div>
        </div>
    </div>

</form>

@endsection
