@extends('layout.app')

@section('content')

<div class="row mb-3">
    <div class="col-12">
        <a class="btn btn-primary" href="/ingredients">Retour</a>
    </div>
</div>

<form action="/ingredients" method="POST">
    @csrf

    <div class="row">
        <div class="col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card">
                <div class="card-header">
                    Nouvel ingrédient
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="inputName">Nom de l'ingrédient</label>
                            <input type="text" name="name" class="form-control" id="inputName" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-12">
                                <label for="inputUnit">Unité</label>
                                <select name="unit" class="form-control" id="inputUnit">
                                    <option value="">Sélectionner une unité</option>
                                    @foreach(App\Models\Ingredient::UNITS as $id => $unit)
                                        <option value="{{ $id }}" {{ old('unit') == $id ? 'selected' : '' }}>
                                            {{ $unit ?: 'nombre' }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('unit'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('unit') }}
                                    </div>
                                @endif
                            </div>
                        <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
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
