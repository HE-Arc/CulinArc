<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    public function run()
    {
        DB::table('ingredients')->insert([

            ['name' => 'fromage râpé', 'unit' => 1], // g
            ['name' => 'pâtes', 'unit' => 1], // g
            ['name' => 'parmesan', 'unit' => 1], // g
            ['name' => 'poulet', 'unit' => 1], // g
            ['name' => 'curry', 'unit' => 8], // c. à café
            ['name' => 'oignon', 'unit' => 2], //
            ['name' => 'pommes de terre', 'unit' => 1],
            ['name' => 'crème', 'unit' => 4], // cl
            ['name' => 'gousse d\'ail', 'unit' => 2], //
            ['name' => 'beurre', 'unit' => 1], // g
            ['name' => 'poivron', 'unit' => 2], //
            ['name' => 'champignons', 'unit' => 1],
            ['name' => 'sauce soja', 'unit' => 7], // c. à soupe
            ['name' => 'pavés de saumon', 'unit' => 2], //
            ['name' => 'citron', 'unit' => 2], //
            ['name' => 'herbes fraîches', 'unit' => 8], // c. à café
            ['name' => 'farine', 'unit' => 1], // g
            ['name' => 'sucre roux', 'unit' => 1], // g
            ['name' => 'levure chimique', 'unit' => 8], // c. à café
            ['name' => 'pépites de chocolat', 'unit' => 1], // g
            ['name' => 'câpres', 'unit' => 8], // c. à café
            ['name' => 'moutarde', 'unit' => 8], // c. à café
            ['name' => 'estragon', 'unit' => 9], // pincée
            ['name' => 'persil', 'unit' => 9], // pincée
            ['name' => 'lait', 'unit' => 4], // cl
            ['name' => 'œufs', 'unit' => 2], //
            ['name' => 'sucre', 'unit' => 7], // c. à soupe
            ['name' => 'nouilles', 'unit' => 1], // g
            ['name' => 'huile', 'unit' => 7], // c. à soupe
            ['name' => 'sel', 'unit' => 9], // pincée
            ['name' => 'poivre', 'unit' => 9], // pincée
        ]);
    }
}
