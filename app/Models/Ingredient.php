<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
   use HasFactory;

   public const UNITS = [
      1 => 'g',
      2 => '',
      3 => 'ml',
      4 => 'cl',
      5 => 'dl',
      6 => 'l',
      7 => 'c. à soupe',
      8 => 'c. à café',
      9 => 'pincée',
   ];

   protected $fillable = ['name', 'unit'];

   public function recipes(): BelongsToMany
   {
       return $this->belongsToMany(Recipe::class);
   }

   public static function getUnitID($unit)
   {
      return array_search($unit, self::UNITS);
   }
   
   public function getUnitAttribute()
   {
      return self::UNITS[ $this->attributes['unit'] ];
   }
   
   public function setUnitAttribute($value)
   {
      $unitID = self::getUnitID($value);
      if ($unitID) {
         $this->attributes['unit'] = $unitID;
      }
   }
}
