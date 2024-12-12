<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [RecipeController::class, 'index']);
Route::get('home', function () {
    return redirect('/');
})->name('home');

Route::resource('ingredients', IngredientController::class);
Route::resource('recipes', RecipeController::class);

Route::middleware('guest')->group(function () {
    Route::get('login', [UserController::class, 'index'])->name('login');
    Route::post('login', [UserController::class, 'login']);
    Route::get('register', [UserController::class, 'create'])->name('register');
    Route::post('register', [UserController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
});

Route::middleware('admin')->group(function () {
    Route::get('recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
});
