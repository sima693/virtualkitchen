<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
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

Route::get('/', [RecipeController::class, 'index'])->name('home');

// Authentication Routes
Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register')
    ->middleware('guest');

Route::post('register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');

// Recipe Routes
Route::get('/recipes/search', [RecipeController::class, 'search'])->name('recipes.search');
Route::resource('recipes', RecipeController::class);

Route::middleware('auth')->group(function () {
    // Remove profile routes
});

require __DIR__.'/auth.php';
