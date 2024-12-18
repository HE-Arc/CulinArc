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
        return $this->belongsToMany(Ingredient::class, 'recipes_ingredients', 'recipe_id', 'ingredient_id')
                    ->withPivot('quantity');
    }

    public function isFavorite($userId): bool
    {
        return $this->users()->where('user_id', $userId)->exists();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'recipes_users', 'recipe_id', 'user_id');
    }

    public static function getDifficultyID($difficulty)
    {
       return array_search($difficulty, self::DIFFICULTY);
    }

    public function getDifficultyAttribute()
    {
       return self::DIFFICULTY[ $this->attributes['difficulty']];
    }
  
    public static function getTypeID($type)
    {
       return array_search($type, self::TYPE);
    }

    public function getTypeAttribute()
    {
       return self::TYPE[ $this->attributes['type'] ];
    }

    public function getPreparationAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setPreparationAttribute($value)
    {
        $this->attributes['preparation'] = json_encode($value);
    }
}
