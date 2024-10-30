<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    public const DIFFICULTY = [
        1 => 'Facile',
        2 => 'Moyen',
        3 => 'Difficile',
    ];

    public const TYPE = [
        1 => 'Entrée',
        2 => 'Plat',
        3 => 'Dessert',
        4 => 'Divers',
    ];

    protected $fillable = ['title', 'difficulty', 'type', 'preparation_time', 'image', 'preparation'];

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public static function getDifficultyID($difficulty)
    {
       return array_search($difficulty, self::DIFFICULTY);
    }
    
    public function getDifficultyAttribute()
    {
       return self::DIFFICULTY[ $this->attributes['difficulty']];
    }
    
   //  public function setDifficultyAttribute($value)
   //  {
   //     $difficultyID = self::getDifficutlyID($value);
   //     if ($difficultyID) {
   //        $this->attributes['difficulty'] = $difficultyID;
   //     }
   //  }
    
    public static function getTypeID($type)
    {
       return array_search($type, self::DIFFICULTY);
    }
    
    public function getTypeAttribute()
    {
       return self::TYPE[ $this->attributes['type'] ];
    }
    
   //  public function setTypeAttribute($value)
   //  {
   //     $typeID = self::getTypeID($value);
   //     if ($typeID) {
   //        $this->attributes['type'] = $typeID;
   //     }
   //  }
}
