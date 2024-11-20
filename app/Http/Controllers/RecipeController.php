<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des entrées
        $validated = $request->validate([
            'title' => 'required|min:2|max:50',
            'preparation_time' => 'required|numeric|min:1',
            'difficulty' => 'required|in:1,2,3',
            'type' => 'required|in:1,2,3,4',
            'preparation' => 'required|string|min:10',
            'image' => 'sometimes|image'
        ]);

        // Traitement du fichier image
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                // stocker l'image dans le dossier public/images
                $path = $request->file('image')->store('images', 'public');
                //  chemin de l'image aux données validées
                $validated['image'] = $path;
            } else {
                // Retourner une erreur si fichier image invalide
                return back()->withErrors(['image' => 'Invalid image file.'])->withInput();
            }
        } else {
            // TODO: replace with a default image (default value in db)
            $validated['image'] = "";
        }

        Recipe::create($validated);

        return redirect()->route('recipes.index')->with('success', 'Recette créé avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation des données reçues
        $validated = $request->validate([
            'title' => 'required|min:2|max:50',
            'difficulty' => 'required|in:1,2,3',
            'type' => 'required|in:1,2,3,4',
            'preparation_time' => 'required|numeric|min:1',
            'image' => 'sometimes|image',
            'preparation' => 'required|string|min:10'
        ]);

        // Récupération de la recette ou échec si non trouvée
        $recipe = Recipe::findOrFail($id);

        $recipe->update($validated);

        return redirect()->route('recipes.index')->with('success', 'Recette modifiée avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recette supprimée avec succès!');
    }

}
