<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
   use HasFactory;

   public const UNITS = [
      1 => 'g',
      2 => 'pièces',
      3 => 'ml',
      4 => 'cl',
      5 => 'dl',
      6 => 'l',
      7 => 'c. à soupe',
      8 => 'c. à café',
      9 => 'pincées',
   ];

   protected $fillable = ['name', 'unit'];

   public function recipes(): HasMany
   {
    return $this->belongsToMany(Recipe::class, 'recipes_ingredients', 'ingredient_id', 'recipe_id')
                ->withPivot('quantity');
   }

   /**
    * Retourne l'ID correspondant à l'unité
    *
    * @param string $unit
    * @return int
    */
   public static function getUnitID($unit)
   {
      return array_search($unit, self::UNITS);
   }

   /**
    * Retourne l'unité de l'ingrédient
    * @return string
    */
   public function getUnitAttribute()
   {
      return self::UNITS[ $this->attributes['unit'] ];
   }
}
