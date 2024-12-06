<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipesIngredientsSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Omelette simple au fromage
            ['recipe_id' => 1, 'ingredient_id' => 26, 'quantity' => 3],   // œufs
            ['recipe_id' => 1, 'ingredient_id' => 1, 'quantity' => 50],   // fromage râpé
            ['recipe_id' => 1, 'ingredient_id' => 30, 'quantity' => 1],   // pincée de sel
            ['recipe_id' => 1, 'ingredient_id' => 31, 'quantity' => 1],   // pincée de poivre
            ['recipe_id' => 1, 'ingredient_id' => 10, 'quantity' => 10],  // beurre

            // Pâtes au beurre et parmesan
            ['recipe_id' => 2, 'ingredient_id' => 2, 'quantity' => 200],  // pâtes
            ['recipe_id' => 2, 'ingredient_id' => 10, 'quantity' => 50],  // beurre
            ['recipe_id' => 2, 'ingredient_id' => 3, 'quantity' => 30],   // parmesan
            ['recipe_id' => 2, 'ingredient_id' => 30, 'quantity' => 1],   // pincée de sel
            ['recipe_id' => 2, 'ingredient_id' => 31, 'quantity' => 1],   // pincée de poivre

            // Poulet sauté au curry
            ['recipe_id' => 3, 'ingredient_id' => 4, 'quantity' => 300],  // poulet
            ['recipe_id' => 3, 'ingredient_id' => 5, 'quantity' => 2],    // curry
            ['recipe_id' => 3, 'ingredient_id' => 8, 'quantity' => 10],   // crème
            ['recipe_id' => 3, 'ingredient_id' => 6, 'quantity' => 1],    // oignon
            ['recipe_id' => 3, 'ingredient_id' => 29, 'quantity' => 2],   // huile
            ['recipe_id' => 3, 'ingredient_id' => 30, 'quantity' => 1],   // pincée de sel
            ['recipe_id' => 3, 'ingredient_id' => 31, 'quantity' => 1],   // pincée de poivre

            // Gratin de pommes de terre
            ['recipe_id' => 4, 'ingredient_id' => 7, 'quantity' => 500],  // pommes de terre
            ['recipe_id' => 4, 'ingredient_id' => 8, 'quantity' => 20],   // crème
            ['recipe_id' => 4, 'ingredient_id' => 1, 'quantity' => 100],  // fromage râpé
            ['recipe_id' => 4, 'ingredient_id' => 9, 'quantity' => 1],    // gousse d’ail
            ['recipe_id' => 4, 'ingredient_id' => 10, 'quantity' => 10],  // beurre
            ['recipe_id' => 4, 'ingredient_id' => 30, 'quantity' => 1],   // pincée de sel
            ['recipe_id' => 4, 'ingredient_id' => 31, 'quantity' => 1],   // pincée de poivre

            // Salade de pâtes au poulet et légumes
            ['recipe_id' => 5, 'ingredient_id' => 2, 'quantity' => 200],  // pâtes
            ['recipe_id' => 5, 'ingredient_id' => 4, 'quantity' => 150],  // poulet
            ['recipe_id' => 5, 'ingredient_id' => 15, 'quantity' => 1],   // poivron
            ['recipe_id' => 5, 'ingredient_id' => 16, 'quantity' => 50],  // champignons
            ['recipe_id' => 5, 'ingredient_id' => 13, 'quantity' => 2],   // sauce soja
            ['recipe_id' => 5, 'ingredient_id' => 29, 'quantity' => 1],   // huile

            // Saumon en papillote au citron et herbes
            ['recipe_id' => 6, 'ingredient_id' => 14, 'quantity' => 2],   // pavés de saumon
            ['recipe_id' => 6, 'ingredient_id' => 15, 'quantity' => 1],   // citron
            ['recipe_id' => 6, 'ingredient_id' => 16, 'quantity' => 1],   // herbes fraîches
            ['recipe_id' => 6, 'ingredient_id' => 9, 'quantity' => 1],    // gousse d'ail
            ['recipe_id' => 6, 'ingredient_id' => 29, 'quantity' => 2],   // huile
            ['recipe_id' => 6, 'ingredient_id' => 30, 'quantity' => 1],   // pincée de sel
            ['recipe_id' => 6, 'ingredient_id' => 31, 'quantity' => 1],   // pincée de poivre

            // Cookies au chocolat
            ['recipe_id' => 7, 'ingredient_id' => 18, 'quantity' => 200],  // farine
            ['recipe_id' => 7, 'ingredient_id' => 19, 'quantity' => 100],  // beurre
            ['recipe_id' => 7, 'ingredient_id' => 20, 'quantity' => 80],   // sucre roux
            ['recipe_id' => 7, 'ingredient_id' => 26, 'quantity' => 1],    // œuf
            ['recipe_id' => 7, 'ingredient_id' => 8, 'quantity' => 1],     // levure chimique
            ['recipe_id' => 7, 'ingredient_id' => 30, 'quantity' => 1],    // pincée de sel
            ['recipe_id' => 7, 'ingredient_id' => 23, 'quantity' => 100],  // pépites de chocolat

            // Beurre Café de Paris maison
            ['recipe_id' => 8, 'ingredient_id' => 10, 'quantity' => 100],  // beurre
            ['recipe_id' => 8, 'ingredient_id' => 23, 'quantity' => 1],    // câpres
            ['recipe_id' => 8, 'ingredient_id' => 9, 'quantity' => 1],     // gousse d'ail
            ['recipe_id' => 8, 'ingredient_id' => 22, 'quantity' => 1],    // moutarde
            ['recipe_id' => 8, 'ingredient_id' => 5, 'quantity' => 1],     // curry
            ['recipe_id' => 8, 'ingredient_id' => 24, 'quantity' => 1],    // estragon
            ['recipe_id' => 8, 'ingredient_id' => 25, 'quantity' => 1],    // persil

            // Pancakes express
            ['recipe_id' => 9, 'ingredient_id' => 18, 'quantity' => 200],  // farine
            ['recipe_id' => 9, 'ingredient_id' => 17, 'quantity' => 20],   // lait
            ['recipe_id' => 9, 'ingredient_id' => 26, 'quantity' => 2],    // œufs
            ['recipe_id' => 9, 'ingredient_id' => 8, 'quantity' => 1],     // levure chimique
            ['recipe_id' => 9, 'ingredient_id' => 20, 'quantity' => 2],    // sucre
            ['recipe_id' => 9, 'ingredient_id' => 10, 'quantity' => 10],   // beurre

            // Soupe de champignons crémeuse
            ['recipe_id' => 10, 'ingredient_id' => 12, 'quantity' => 300],  // champignons
            ['recipe_id' => 10, 'ingredient_id' => 6, 'quantity' => 1],    // oignon
            ['recipe_id' => 10, 'ingredient_id' => 8, 'quantity' => 20],   // crème
            ['recipe_id' => 10, 'ingredient_id' => 29, 'quantity' => 2],   // huile
            ['recipe_id' => 10, 'ingredient_id' => 30, 'quantity' => 1],   // sel
            ['recipe_id' => 10, 'ingredient_id' => 31, 'quantity' => 1],   // poivre
        ];

        DB::table('recipes_ingredients')->insert($data);
    }
}
