<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        DB::table('recipes')->insert([
            [
                'title' => 'Omelette au fromage',
                'image' => 'images/omelette.jpg',
                'preparation_time' => 10,
                'difficulty' => 1,
                'type' => 2,
                'preparation' => json_encode([
                    ['action' => 'Casser les œufs dans un bol, ajouter le sel, le poivre et battre.'],
                    ['action' => 'Faire fondre le beurre dans une poêle.'],
                    ['action' => 'Verser les œufs battus et cuire à feu moyen.'],
                    ['action' => 'Ajouter le fromage râpé et plier l’omelette en deux.'],
                    ['action' => 'Servir chaud.']
                ]),
            ],
            [
                'title' => 'Pâtes au beurre et parmesan',
                'image' => 'images/pates-parmesan.jpg',
                'preparation_time' => 15,
                'difficulty' => 1,
                'type' => 2,
                'preparation' => json_encode([
                    ['action' => 'Faire cuire les pâtes dans de l\'eau bouillante salée selon les instructions du paquet.'],
                    ['action' => 'Égoutter les pâtes et ajouter le beurre.'],
                    ['action' => 'Saupoudrer de parmesan et poivrer légèrement.'],
                    ['action' => 'Mélanger et servir chaud.']
                ]),
            ],
            [
                'title' => 'Poulet sauté au curry',
                'image' => 'images/poulet-curry.jpg',
                'preparation_time' => 25,
                'difficulty' => 3,
                'type' => 2,
                'preparation' => json_encode([
                    ['action' => 'Émincer l’oignon et le poulet.'],
                    ['action' => 'Faire chauffer l\'huile dans une poêle et faire revenir l’oignon.'],
                    ['action' => 'Ajouter le poulet et cuire jusqu’à ce qu’il soit doré.'],
                    ['action' => 'Saupoudrer de curry et mélanger.'],
                    ['action' => 'Verser la crème, saler et poivrer.'],
                    ['action' => 'Laisser mijoter quelques minutes et servir chaud.']
                ]),
            ],
            [
                'title' => 'Gratin de pommes de terre',
                'image' => 'images/gratin.jpg',
                'preparation_time' => 45,
                'difficulty' => 2,
                'type' => 2,
                'preparation' => json_encode([
                    ['action' => 'Éplucher et couper les pommes de terre en fines rondelles.'],
                    ['action' => 'Frotter un plat avec la gousse d’ail et beurrer légèrement.'],
                    ['action' => 'Disposer les pommes de terre dans le plat, saler et poivrer.'],
                    ['action' => 'Verser la crème et saupoudrer de fromage râpé.'],
                    ['action' => 'Cuire au four à 180°C pendant 40 minutes.']
                ]),
            ],
            [
                'title' => 'Salade de pâtes au poulet et légumes',
                'image' => 'images/salade-pates.jpg',
                'preparation_time' => 20,
                'difficulty' => 2,
                'type' => 2,
                'preparation' => json_encode([
                    ['action' => 'Faire cuire les pâtes dans de l’eau bouillante salée, puis égoutter.'],
                    ['action' => 'Faire revenir le poulet dans l’huile jusqu’à ce qu’il soit doré.'],
                    ['action' => 'Ajouter les poivrons coupés en dés et les champignons émincés.'],
                    ['action' => 'Mélanger le tout avec la sauce soja et les pâtes égouttées.'],
                    ['action' => 'Servir tiède ou froid.']
                ]),
            ],
            [
                'title' => 'Saumon en papillote au citron et herbes',
                'image' => 'images/saumon.jpg',
                'preparation_time' => 15,
                'difficulty' => 1,
                'type' => 2,
                'preparation' => json_encode([
                    ['action' => 'Préchauffer le four à 180°C.'],
                    ['action' => 'Déposer les pavés de saumon sur du papier sulfurisé.'],
                    ['action' => 'Ajouter une rondelle de citron et les herbes fraîches.'],
                    ['action' => 'Arroser d’huile et ajouter une pincée de sel et de poivre.'],
                    ['action' => 'Fermer les papillotes et cuire au four pendant 15 minutes.']
                ]),
            ],
            [
                'title' => 'Cookies au chocolat',
                'image' => 'images/cookies.jpg',
                'preparation_time' => 20,
                'difficulty' => 2,
                'type' => 3,
                'preparation' => json_encode([
                    ['action' => 'Mélanger le beurre fondu avec le sucre roux et l\'œuf.'],
                    ['action' => 'Ajouter la farine, la levure chimique et une pincée de sel.'],
                    ['action' => 'Incorporer les pépites de chocolat.'],
                    ['action' => 'Former des boules de pâte et les disposer sur une plaque de cuisson.'],
                    ['action' => 'Cuire à 180°C pendant 10 à 12 minutes.']
                ]),
            ],
            [
                'title' => 'Beurre Café de Paris maison',
                'image' => 'images/beurre-cafe-paris.jpg',
                'preparation_time' => 10,
                'difficulty' => 1,
                'type' => 4,
                'preparation' => json_encode([
                    ['action' => 'Hacher finement l\'ail, les câpres, le persil et l\'estragon.'],
                    ['action' => 'Mélanger avec le beurre ramolli, la moutarde, le curry et les anchois (si utilisés).'],
                    ['action' => 'Rouler le beurre dans du film plastique et placer au frais.'],
                    ['action' => 'Utiliser sur des steaks, poissons ou légumes.']
                ]),
            ],
            [
                'title' => 'Pancakes express',
                'image' => 'images/pancakes.jpg',
                'preparation_time' => 15,
                'difficulty' => 1,
                'type' => 3,
                'preparation' => json_encode([
                    ['action' => 'Mélanger la farine, la levure et le sucre.'],
                    ['action' => 'Ajouter les œufs et le lait progressivement en fouettant.'],
                    ['action' => 'Beurrer une poêle et y cuire les pancakes à feu moyen.'],
                    ['action' => 'Servir avec du beurre fondu ou du miel si disponible.']
                ]),
            ],
            [
                'title' => 'Soupe de champignons crémeuse',
                'image' => 'images/soupe-champignons.jpg',
                'preparation_time' => 30,
                'difficulty' => 2,
                'type' => 1,
                'preparation' => json_encode([
                    ['action' => 'Faire revenir les champignons et les oignons dans une casserole.'],
                    ['action' => 'Ajouter le bouillon et laisser mijoter 15 minutes.'],
                    ['action' => 'Mixer la soupe, ajouter la crème et réchauffer.'],
                    ['action' => 'Assaisonner et servir avec des croûtons.']
                ]),
            ],

        ]);
    }
}
