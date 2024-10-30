@extends('layout.app')

@section('content')

    <h1>Recettes</h1>
    <a href="{{ route('recipes.create') }}" class="btn btn-primary float-right mb-2">Ajouter une recette</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Recette</th>
                <th scope="col">Type</th>
                <th scope="col">Difficulté</th>
                <th scope="col">Temps de préparation</th>
                <th scope="col">Déroulement</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recipes as $recipe)
                <tr>
                <td>{{ $recipe->title }}</td>
                    <td>{{ $recipe->type }}</td>
                    <td>{{ $recipe->difficulty }}</td>
                    <td>{{ $recipe->preparation_time }}</td>
                    <td>{{ $recipe->preparation }}</td>
                    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?');">                    <td>

                    <td>
                    <a class="btn btn-info" href="{{ route('recipes.show', $recipe->id) }}">
                    <i class="bi bi-eye"></i>
                        </a>
                    </td>

                    <td>
                        <a class="btn btn-primary" href="{{ route('recipes.edit', $recipe->id) }}">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </td>

                    <td>
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
