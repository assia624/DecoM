<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanierController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/', function () {
    return view('welcome');
});
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('home', [HomeController::class, 'home'])->name('home');


Route::get('/articles/{id}', [HomeController::class, 'show'])->name('details');

Route::get('/panier', [PanierController::class, 'index'])->name('panier');
Route::post('/panier/add/{id}', [PanierController::class, 'add'])->name('ajouter');
Route::delete('/panier/delete/{id}', [PanierController::class, 'delete'])->name('supprimer');

require __DIR__.'/auth.php';
