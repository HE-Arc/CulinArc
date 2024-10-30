<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', ['recipes' => $recipes]);
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
        }

        Recipe::create($validated);

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully!');
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
    
        return redirect()->route('recipes.index')->with('success', 'Recette mise à jour avec succès.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully!');
    }

}
