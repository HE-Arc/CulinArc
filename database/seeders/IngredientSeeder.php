<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    public function run()
    {
        DB::table('ingredients')->insert([

            ['name' => 'fromage râpé', 'unit' => 1],
            ['name' => 'pâtes', 'unit' => 1],
            ['name' => 'parmesan', 'unit' => 1],
            ['name' => 'poulet', 'unit' => 1],
            ['name' => 'curry', 'unit' => 8],
            ['name' => 'oignon', 'unit' => 2],
            ['name' => 'pommes de terre', 'unit' => 1],
            ['name' => 'crème', 'unit' => 4],
            ['name' => 'gousse d\'ail', 'unit' => 2],
            ['name' => 'beurre', 'unit' => 1],
            ['name' => 'poivron', 'unit' => 2],
            ['name' => 'champignons', 'unit' => 1],
            ['name' => 'sauce soja', 'unit' => 7],
            ['name' => 'pavés de saumon', 'unit' => 2],
            ['name' => 'citron', 'unit' => 2],
            ['name' => 'herbes fraîches', 'unit' => 8],
            ['name' => 'farine', 'unit' => 1],
            ['name' => 'sucre roux', 'unit' => 1],
            ['name' => 'levure chimique', 'unit' => 8],
            ['name' => 'pépites de chocolat', 'unit' => 1],
            ['name' => 'câpres', 'unit' => 8],
            ['name' => 'moutarde', 'unit' => 8],
            ['name' => 'estragon', 'unit' => 9],
            ['name' => 'persil', 'unit' => 9],
            ['name' => 'lait', 'unit' => 4],
            ['name' => 'œufs', 'unit' => 2],
            ['name' => 'sucre', 'unit' => 7],
            ['name' => 'nouilles', 'unit' => 1],
            ['name' => 'huile', 'unit' => 7],
            ['name' => 'sel', 'unit' => 9],
            ['name' => 'poivre', 'unit' => 9],
        ]);
    }
}
