<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Rota inicial
Route::get('/', function () {
    return view('welcome');
});

// Rotas de autenticação
require __DIR__.'/auth.php';

// Rotas protegidas por autenticação e verificação
Route::middleware(['auth', 'verified'])->group(function () {
    // Rota para o painel do usuário (Dashboard)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rotas para perfil do usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para CRUD de livros
    Route::resource('books', BookController::class);

    // Rota de leitura de livro
    Route::get('/books/{book}/read', [BookController::class, 'read'])->name('books.read');

    // Rota de visualização de livro
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
});

// Rota de logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
