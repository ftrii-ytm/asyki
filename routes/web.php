<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\GAController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PaymentController;

// =======================
// 🔹 DASHBOARD REDIRECT
// =======================
Route::get('/', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }

    $role = Auth::user()->role;

    return match ($role) {
        'ga' => redirect()->route('ga.index'),
        'keuangan' => redirect()->route('keuangan.index'),
        'payment' => redirect()->route('payment.index'),
        default => redirect()->route('pengajuan.index'),
    };
});

// =======================
// 🔹 PENGAJU ROUTES
// =======================
Route::middleware(['auth'])->group(function () {
    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan.create');
    Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');
    Route::get('/pengajuan/{id}/edit', [PengajuanController::class, 'edit'])->name('pengajuan.edit');
    Route::put('/pengajuan/{id}', [PengajuanController::class, 'update'])->name('pengajuan.update');
    Route::delete('/pengajuan/{id}', [PengajuanController::class, 'destroy'])->name('pengajuan.destroy');
    Route::post('/pengajuan/{id}/kirim', [PengajuanController::class, 'kirim'])->name('pengajuan.kirim');
});

// =======================
// 🔹 GA ROUTES
// =======================
Route::middleware(['auth'])->group(function () {
    // GA
    Route::get('/ga', [GAController::class, 'index'])->name('ga.index');
    Route::post('/ga/approve/{id}', [GAController::class, 'approve'])->name('ga.approve');
    Route::post('/ga/reject/{id}', [GAController::class, 'reject'])->name('ga.reject');
});


// =======================
// 🔹 KEUANGAN ROUTES
// =======================
Route::middleware(['auth'])->group(function () {
    Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan.index');
    Route::post('/keuangan/approve/{id}', [KeuanganController::class, 'approve'])->name('keuangan.approve');
    Route::post('/keuangan/reject/{id}', [KeuanganController::class, 'reject'])->name('keuangan.reject');
});

// =======================
// 🔹 PAYMENT ROUTES
// =======================
Route::middleware(['auth'])->group(function () {
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payment/create/{id}', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment/store/{id}', [PaymentController::class, 'store'])->name('payment.store');
});

require __DIR__ . '/auth.php';  
