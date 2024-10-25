@extends('layout.app')

@section('content')

    <h1>Ingrédients</h1>
    <a href="{{ route('ingredients.create') }}" class="btn btn-primary float-right mb-2">Ajouter un ingrédient</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Unité</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->name }}</td>
                    <td>{{ $ingredient->unit }}</td>

                    <td>
                        <a class="btn btn-info" href="{{ route('ingredients.show', $ingredient->id) }}">
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>

                    <td>
                        <a class="btn btn-primary" href="{{ route('ingredients.edit', $ingredient->id) }}">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </td>

                    <td>
                        <form action="{{ route('ingredients.destroy', $ingredient->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet ingrédient ?');">
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
