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
                    ['step' => 1, 'action' => 'Casser les œufs dans un bol, ajouter le sel, le poivre et battre.'],
                    ['step' => 2, 'action' => 'Faire fondre le beurre dans une poêle.'],
                    ['step' => 3, 'action' => 'Verser les œufs battus et cuire à feu moyen.'],
                    ['step' => 4, 'action' => 'Ajouter le fromage râpé et plier l’omelette en deux.'],
                    ['step' => 5, 'action' => 'Servir chaud.']
                ]),
            ],
            [
                'title' => 'Pâtes au beurre et parmesan',
                'image' => 'images/pates-parmesan.jpg',
                'preparation_time' => 15,
                'difficulty' => 1,
                'type' => 2,
                'preparation' => json_encode([
                    ['step' => 1, 'action' => 'Faire cuire les pâtes dans de l\'eau bouillante salée selon les instructions du paquet.'],
                    ['step' => 2, 'action' => 'Égoutter les pâtes et ajouter le beurre.'],
                    ['step' => 3, 'action' => 'Saupoudrer de parmesan et poivrer légèrement.'],
                    ['step' => 4, 'action' => 'Mélanger et servir chaud.']
                ]),
            ],
            [
                'title' => 'Poulet sauté au curry',
                'image' => 'images/poulet-curry.jpg',
                'preparation_time' => 25,
                'difficulty' => 3,
                'type' => 2,
                'preparation' => json_encode([
                    ['step' => 1, 'action' => 'Émincer l’oignon et le poulet.'],
                    ['step' => 2, 'action' => 'Faire chauffer l\'huile dans une poêle et faire revenir l’oignon.'],
                    ['step' => 3, 'action' => 'Ajouter le poulet et cuire jusqu’à ce qu’il soit doré.'],
                    ['step' => 4, 'action' => 'Saupoudrer de curry et mélanger.'],
                    ['step' => 5, 'action' => 'Verser la crème, saler et poivrer.'],
                    ['step' => 6, 'action' => 'Laisser mijoter quelques minutes et servir chaud.']
                ]),
            ],
            [
                'title' => 'Gratin de pommes de terre',
                'image' => 'images/gratin.jpg',
                'preparation_time' => 45,
                'difficulty' => 2,
                'type' => 2,
                'preparation' => json_encode([
                    ['step' => 1, 'action' => 'Éplucher et couper les pommes de terre en fines rondelles.'],
                    ['step' => 2, 'action' => 'Frotter un plat avec la gousse d’ail et beurrer légèrement.'],
                    ['step' => 3, 'action' => 'Disposer les pommes de terre dans le plat, saler et poivrer.'],
                    ['step' => 4, 'action' => 'Verser la crème et saupoudrer de fromage râpé.'],
                    ['step' => 5, 'action' => 'Cuire au four à 180°C pendant 40 minutes.']
                ]),
            ],
            [
                'title' => 'Salade de pâtes au poulet et légumes',
                'image' => 'images/salade-pates.jpg',
                'preparation_time' => 20,
                'difficulty' => 2,
                'type' => 2,
                'preparation' => json_encode([
                    ['step' => 1, 'action' => 'Faire cuire les pâtes dans de l’eau bouillante salée, puis égoutter.'],
                    ['step' => 2, 'action' => 'Faire revenir le poulet dans l’huile jusqu’à ce qu’il soit doré.'],
                    ['step' => 3, 'action' => 'Ajouter les poivrons coupés en dés et les champignons émincés.'],
                    ['step' => 4, 'action' => 'Mélanger le tout avec la sauce soja et les pâtes égouttées.'],
                    ['step' => 5, 'action' => 'Servir tiède ou froid.']
                ]),
            ],
            [
                'title' => 'Saumon en papillote au citron et herbes',
                'image' => 'images/saumon.jpg',
                'preparation_time' => 15,
                'difficulty' => 1,
                'type' => 2,
                'preparation' => json_encode([
                    ['step' => 1, 'action' => 'Préchauffer le four à 180°C.'],
                    ['step' => 2, 'action' => 'Déposer les pavés de saumon sur du papier sulfurisé.'],
                    ['step' => 3, 'action' => 'Ajouter une rondelle de citron et les herbes fraîches.'],
                    ['step' => 4, 'action' => 'Arroser d’huile et ajouter une pincée de sel et de poivre.'],
                    ['step' => 5, 'action' => 'Fermer les papillotes et cuire au four pendant 15 minutes.']
                ]),
            ],
            [
                'title' => 'Cookies au chocolat',
                'image' => 'images/cookies.jpg',
                'preparation_time' => 20,
                'difficulty' => 2,
                'type' => 3,
                'preparation' => json_encode([
                    ['step' => 1, 'action' => 'Mélanger le beurre fondu avec le sucre roux et l\'œuf.'],
                    ['step' => 2, 'action' => 'Ajouter la farine, la levure chimique et une pincée de sel.'],
                    ['step' => 3, 'action' => 'Incorporer les pépites de chocolat.'],
                    ['step' => 4, 'action' => 'Former des boules de pâte et les disposer sur une plaque de cuisson.'],
                    ['step' => 5, 'action' => 'Cuire à 180°C pendant 10 à 12 minutes.']
                ]),
            ],
            [
                'title' => 'Beurre Café de Paris maison',
                'image' => 'images/beurre-cafe-paris.jpg',
                'preparation_time' => 10,
                'difficulty' => 1,
                'type' => 4,
                'preparation' => json_encode([
                    ['step' => 1, 'action' => 'Hacher finement l\'ail, les câpres, le persil et l\'estragon.'],
                    ['step' => 2, 'action' => 'Mélanger avec le beurre ramolli, la moutarde, le curry et les anchois (si utilisés).'],
                    ['step' => 3, 'action' => 'Rouler le beurre dans du film plastique et placer au frais.'],
                    ['step' => 4, 'action' => 'Utiliser sur des steaks, poissons ou légumes.']
                ]),
            ],
            [
                'title' => 'Pancakes express',
                'image' => 'images/pancakes.jpg',
                'preparation_time' => 15,
                'difficulty' => 1,
                'type' => 3,
                'preparation' => json_encode([
                    ['step' => 1, 'action' => 'Mélanger la farine, la levure et le sucre.'],
                    ['step' => 2, 'action' => 'Ajouter les œufs et le lait progressivement en fouettant.'],
                    ['step' => 3, 'action' => 'Beurrer une poêle et y cuire les pancakes à feu moyen.'],
                    ['step' => 4, 'action' => 'Servir avec du beurre fondu ou du miel si disponible.']
                ]),
            ],
            [
                'title' => 'Soupe de champignons crémeuse',
                'image' => 'images/soupe-champignons.jpg',
                'preparation_time' => 30,
                'difficulty' => 2,
                'type' => 1,
                'preparation' => json_encode([
                    ['step' => 1, 'action' => 'Faire revenir les champignons et les oignons dans une casserole.'],
                    ['step' => 2, 'action' => 'Ajouter le bouillon et laisser mijoter 15 minutes.'],
                    ['step' => 3, 'action' => 'Mixer la soupe, ajouter la crème et réchauffer.'],
                    ['step' => 4, 'action' => 'Assaisonner et servir avec des croûtons.']
                ]),
            ],

        ]);
    }
}
