<!----------------------------------->
<!-- code inutilisé (comme discuté) -->
<!----------------------------------->
@extends('layout.app')

@section('content')

<div class="row">
    <div class="col-12">
        <a class="btn btn-primary" href="/ingredients"> Retour</a>
    </div>
</div>

<form action="/ingredients/{{$ingredient->id}}" method="POST">
    @csrf
    @method('PUT')

    <div class="card col-12 col-lg-6 offset-0 offset-lg-3">
        <div class="card-header">
            Modifier un ingrédient
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputName">Nom</label>
                    <input type="text" name="name" value="{{$ingredient->name}}" class="form-control" id="inputName">
                </div>
                <div class="row mt-3">
                    <div class="form-group col-12">
                        <label for="inputUnit">Unité</label>
                        <select name="unit" class="form-control" id="inputUnit">
                            @foreach(App\Models\Ingredient::UNITS as $id => $unit)
                                <option value="{{ $id }}" {{ $ingredient->unit == $unit ? 'selected' : '' }}>
                                    {{ $unit }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
                </div>
            </div>
        </div>
    </div>

</form>
@endsection
