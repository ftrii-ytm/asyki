<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\GAController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PaymentController;

// Halaman Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// PENGAJUAN (User) - semua route pakai middleware auth
Route::middleware('auth')->group(function () {

    // Halaman daftar pengajuan
    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');

    // Halaman create pengajuan
    Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan.create');

    // Load form AJAX sesuai jenis pengajuan
    Route::get('/pengajuan/form/{jenis}', [PengajuanController::class, 'loadForm'])->name('pengajuan.form');

    // Simpan pengajuan baru
    Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');

    // Edit pengajuan
    Route::get('/pengajuan/{id}/edit', [PengajuanController::class, 'edit'])->name('pengajuan.edit');

    // Update pengajuan
    Route::put('/pengajuan/{id}', [PengajuanController::class, 'update'])->name('pengajuan.update');

    // Hapus pengajuan
    Route::delete('/pengajuan/{id}', [PengajuanController::class, 'destroy'])->name('pengajuan.destroy');

    // Kirim pengajuan ke GA
    Route::post('/pengajuan/{id}/kirim', [PengajuanController::class, 'kirim'])->name('pengajuan.kirim');
});

// GA - approve/reject
Route::middleware('auth')->group(function () {
    Route::get('/ga', [GAController::class, 'index'])->name('ga.index');
    Route::post('/ga/approve/{id}', [GAController::class, 'approve'])->name('ga.approve');
    Route::post('/ga/reject/{id}', [GAController::class, 'reject'])->name('ga.reject');
});

// KEUANGAN - approve/reject
Route::middleware('auth')->group(function () {
    Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan.index');
    Route::post('/keuangan/approve/{id}', [KeuanganController::class, 'approve'])->name('keuangan.approve');
    Route::post('/keuangan/reject/{id}', [KeuanganController::class, 'reject'])->name('keuangan.reject');
});

// PAYMENT
Route::middleware('auth')->group(function () {
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payment/create/{id}', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment/store/{id}', [PaymentController::class, 'store'])->name('payment.store');
});

// Auth routes (login, register, logout, dll)
require __DIR__.'/auth.php';
