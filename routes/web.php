<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;

// Home
Route::get('/', [RecipeController::class, 'index']);
Route::get('home', function () {
    return redirect('/');
})->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::resource('recipes', RecipeController::class);

//Guest uniquement 
Route::middleware('guest')->group(function () {
    Route::get('login', [UserController::class, 'index'])->name('login');
    Route::post('login', [UserController::class, 'login']);
    Route::get('register', [UserController::class, 'create'])->name('register');
    Route::post('register', [UserController::class, 'store']);
});

//Utilisateur et admin
Route::middleware('auth')->group(function () {
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('favorites', [UserController::class, 'favorites'])->name('favorites');
    Route::post('recipes/{recipe}/favorite', [RecipeController::class, 'toggleFavorite'])->name('recipes.favorite');
});

//Admin uniquement
Route::middleware('admin')->group(function () {
    Route::get('recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
});
