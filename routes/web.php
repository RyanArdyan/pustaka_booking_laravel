<?php

use Illuminate\Support\Facades\Route;
// import atau gunakan controller
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminBukuController;

// panggil routes/auth.php
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('frontend.beranda.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // DASHBOARD
    // rute tipe dapatkan, jika user diarahkan ke url /dashboard maka panggil controller dan method index di dalamnya, name nya adalah admin.dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // AKHIR DASHBOARD

    // BUKU
    // rute tipe dapatkan, jika user diarahkan ke url /admin/buku maka panggil controller dan method index di dalamnya, name nya adalah admin.buku
    Route::get('/admin/buku', [AdminBukuController::class, 'index'])->name('admin.buku');
    // rute tipe dapatkan, jika user diarahkan ke url berikut maka panggil controller berikut dan method create di dalamnya, name nya adalah admin.create_buku
    Route::get('/admin/create-buku', [AdminBukuController::class, 'create'])->name('admin.create_buku');
    // rute tipe kirim, jika user diarahkan ke url /admin/store-buku maka panggil AdminBukuController dan method store di dalamnya, name nya adalah admin.store_buku
    Route::post('/admin/store-buku', [AdminBukuController::class, 'store'])->name('admin.store_buku');
    // AKHIR BUKU
});




