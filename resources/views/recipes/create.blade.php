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
                        <div class="form-group col-12">
                            <label for="inputTitle">Nom de la recette</label>
                            <input type="text" name="title" class="form-control" id="inputTitle" value="{{ old('title') }}">
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
                            <input type="number" name="preparation_time" class="form-control" id="inputPreparationTime" value="{{ old('preparation_time') }}">
                            @error('preparation_time')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

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

                        <div class="form-group col-12">
                            <label for="inputPreparation">Préparation</label>
                            <textarea name="preparation" class="form-control" id="inputPreparation" rows="4">{{ old('preparation') }}</textarea>
                            @error('preparation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Créer</button>
                    </div>
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
