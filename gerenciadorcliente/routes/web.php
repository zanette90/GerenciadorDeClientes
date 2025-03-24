<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cadastro', [ClienteController::class, 'index'])->name('cliente.cadastro');
});

Route::post('/cadastro', [ClienteController::class, 'create'])->name('cliente.salvar');

Route::get('/clientes', [ClienteController::class, 'list'])->name('cliente.listagem');
require __DIR__.'/auth.php';
