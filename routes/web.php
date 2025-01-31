<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\DocumentsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [ProjectsController::class, 'index'])->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/visualizar/{id}', [ProjectsController::class, 'show'])->name('show');
        Route::get('/create', [ProjectsController::class, 'create'])->name('create');
        Route::post('/store', [ProjectsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProjectsController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [ProjectsController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProjectsController::class, 'destroy'])->name('destroy');
    });

    Route::get('/documents/download/{id}', [DocumentsController::class, 'download'])->name('documents.download');
    Route::delete('/documents/{id}', [DocumentsController::class, 'destroy'])->name('documents.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
