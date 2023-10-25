<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recipes', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('recipes.all');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('all-users', [UserController::class, 'users'])->name('users');
    Route::get('view-user/{name}', [UserController::class, 'viewUserById'])->name('view-user');
    Route::post('search-recipe', [RecipeController::class, 'searchRecipe'])->name('search-recipe');
    Route::post('search-restaurant', [RestaurantController::class, 'searchRestaurant'])->name('search-restaurant');
    Route::get('all-recipes', [RecipeController::class, 'recipes'])->name('recipes');
    Route::get('all-restaurants', [RestaurantController::class, 'restaurants'])->name('restaurants');
    Route::get('searched-restaurants', [RestaurantController::class, 'searchedRestaurants'])->name('restaurants.searched');
    Route::get('searched-recipes', [RecipeController::class, 'searchedRecipes'])->name('recipes.searched');
    Route::get('restaurant-search', [RestaurantController::class, 'searchResult'])->name('restaurant.result');
});


require __DIR__.'/auth.php';
