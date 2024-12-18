<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $query = Recipe::query();

        // Filtrer par type
        if ($request->has('type') && $request->type) {
            // Utiliser la méthode getTypeID pour obtenir l'ID à partir du libellé
            $typeID = Recipe::getTypeID($request->type);
            if ($typeID !== false) {
                $query->where('type', $typeID);
            }
        }

        // Filtrer par temps de préparation
        if ($request->has('time') && $request->time) {
            switch ($request->time) {
                case '5-15':
                    $query->whereBetween('preparation_time', [5, 15]);
                    break;
                case '15-30':
                    $query->whereBetween('preparation_time', [15, 30]);
                    break;
                case '30+':
                    $query->where('preparation_time', '>', 30);
                    break;
            }
        }

        // Filtrer par difficulté
        if ($request->has('difficulty') && $request->difficulty) {
            // Utiliser la méthode getDifficultyID pour obtenir l'ID à partir du libellé
            $difficultyID = Recipe::getDifficultyID($request->difficulty);
            if ($difficultyID !== false) {
                $query->where('difficulty', $difficultyID);
            }
        }

        // Récupérer les recettes avec pagination
        $recipes = $query->paginate(9);

        return view('recipes.index', compact('recipes'));
    }


    public function create()
    {
        $ingredients = Ingredient::all();
        return view('recipes.create', compact('ingredients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:2|max:50',
            'preparation_time' => 'required|numeric|min:1',
            'difficulty' => 'required|in:1,2,3',
            'type' => 'required|in:1,2,3,4',
            'preparation' => 'required|array|min:1',
            'preparation.*.action' => 'required|string|min:3',
            'ingredients' => 'required|array|min:1',
            'ingredients.*.id' => 'required|exists:ingredients,id',
            'ingredients.*.quantity' => 'required|numeric|min:1',
            'image' => 'sometimes|image'
        ]);

        // Traitement du fichier image
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $path = $request->file('image')->store('images', 'public');
                $validated['image'] = $path;
            } else {
                return back()->withErrors(['image' => 'Le fichier image est invalide.'])->withInput();
            }
        } else {
            $validated['image'] = "";
        }

        $recipe = Recipe::create([
            'title' => $validated['title'],
            'preparation_time' => $validated['preparation_time'],
            'difficulty' => $validated['difficulty'],
            'type' => $validated['type'],
            'preparation' => $validated['preparation'],
            'image' => $validated['image'],
        ]);

        // Préparer les données pour la table associative
        $ingredientsData = [];
        foreach ($validated['ingredients'] as $ingredient) {
            $ingredientsData[$ingredient['id']] = ['quantity' => $ingredient['quantity']];
        }
        $recipe->ingredients()->sync($ingredientsData);

        return redirect()->route('recipes.show', $recipe->id)->with('success', 'Recette créée avec succès!');
    }

     public function show(string $id)
     {
         $recipe = Recipe::with('ingredients')->findOrFail($id);
         return view('recipes.show', compact('recipe'));
     }

    public function edit(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        $ingredients = Ingredient::all();

        return view('recipes.edit', compact('recipe', 'ingredients'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:2|max:50',
            'preparation_time' => 'required|numeric|min:1',
            'difficulty' => 'required|in:1,2,3',
            'type' => 'required|in:1,2,3,4',
            'preparation' => 'required|array|min:1',
            'preparation.*.action' => 'required|string|min:3',
            'ingredients' => 'required|array|min:1',
            'ingredients.*.id' => 'required|exists:ingredients,id',
            'ingredients.*.quantity' => 'required|numeric|min:1',
            'image' => 'sometimes|image',
        ]);

        $recipe = Recipe::findOrFail($id);

        // Traitement du fichier image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $recipe->update($validated);

        // Synchroniser les ingrédients
        $ingredientsData = [];
        foreach ($validated['ingredients'] as $ingredient) {
            $ingredientsData[$ingredient['id']] = ['quantity' => $ingredient['quantity']];
        }
        $recipe->ingredients()->sync($ingredientsData);
        return redirect()->route('recipes.show', $recipe->id)->with('success', 'Recette modifiée avec succès.');
    }

    public function destroy(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        return redirect()->route('recipes.index')->with('success', 'Recette supprimée avec succès.');
    }

    /*
    * Ajoute ou retire une recette des favoris de l'utilisateur connecté
    */
    public function toggleFavorite(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        $isFavorite = false;

        if ($recipe->isFavorite(Auth::user()->id)) {
            Auth::user()->recipes()->detach($recipe);
        } else {
            Auth::user()->recipes()->attach($recipe);
            $isFavorite = true;
        }

        //adapatation du message à afficher en js
        return response()->json(['success' => true, 'message' => "Recette " . ($isFavorite ? "ajoutée aux" : "retirée des") . " favoris."]);
    }
}
