<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route default dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// --- ROUTE YANG DIKUNCI MIDDLEWARE ---

// Hanya untuk Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', fn () => 'Halaman Admin');
});

// Hanya untuk Dosen
Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dosen', fn () => 'Dashboard Dosen');
});

// Hanya untuk Mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa', fn () => 'Dashboard Mahasiswa');
});

// Bisa diakses Admin DAN Dosen
Route::middleware(['auth', 'role:admin,dosen'])->group(function () {
    Route::get('/kelola-materi', fn () => 'Kelola Materi');
});
