<?php

use App\Http\Controllers\Admin\DocumentTypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get("/home", function () {
    return redirect("/dashboard");
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('role-check', 'auth');
Route::prefix('admin')->middleware(['auth', 'verified',])->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes for Document Type
    Route::get('/document-types', [DocumentTypeController::class, 'index'])->name('document-types.index');
    Route::get('/document-types/create', [DocumentTypeController::class, 'create'])->name('document-types.create');
    Route::post('/document-types', [DocumentTypeController::class, 'store'])->name('document-types.store');
    Route::get('/document-types/{documentType}/edit', [DocumentTypeController::class, 'edit'])->name('document-types.edit');
    Route::put('/document-types/{documentType}', [DocumentTypeController::class, 'update'])->name('document-types.update');
    Route::delete('/document-types/{documentType}', [DocumentTypeController::class, 'destroy'])->name('document-types.destroy');
});

Route::prefix('/pimpinan')->middleware(['auth',])->group(function () {
    Route::get('/dashboard', [DocumentTypeController::class, 'index'])->name('pimpinan.dashboard');
});

require __DIR__ . '/auth.php';
