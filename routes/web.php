<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('home', [HomeController::class, 'home'])->name('home');


Route::get('/articles/{id}', [HomeController::class, 'show'])->name('details');

Route::get('/panier', [PanierController::class, 'index'])->name('panier');
Route::post('/panier/add/{id}', [PanierController::class, 'add'])->name('ajouter');
Route::delete('/panier/delete/{id}', [PanierController::class, 'delete'])->name('supprimer');
Route::post('/panier/ajouter', [PanierController::class, 'ajouterAjax'])->name('panier.ajouterAjax');


require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/confirmation', [CommandeController::class, 'create'])->name('commande.create');
    Route::post('/confirmation', [CommandeController::class, 'store'])->name('commande.store');

    Route::get('/paiement/{id}', [CommandeController::class, 'paiement'])->name('paiement');
    Route::post('/paiement/{id}', [CommandeController::class, 'validerPaiement'])->name('paiement.valider');

    Route::get('/merci/{id}', [CommandeController::class, 'merci'])->name('merci');
});
