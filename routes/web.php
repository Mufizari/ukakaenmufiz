<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\MahasiswaLoginController;
use App\Http\Controllers\Auth\MahasiswaRegisterController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboard;
use App\Http\Controllers\Mahasiswa\PengaduanController as MahasiswaPengaduan;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduan;

// Home
Route::get('/', function () {
    return view('welcome');
});

// Register Mahasiswa
Route::get('/register', [MahasiswaRegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [MahasiswaRegisterController::class, 'register'])->name('register.post');

// Login Mahasiswa
Route::get('/login', [MahasiswaLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [MahasiswaLoginController::class, 'login'])->name('login.post');
Route::post('/logout', [MahasiswaLoginController::class, 'logout'])->name('logout');

// Login Admin
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Routes Mahasiswa (harus login)
Route::middleware(['auth:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', [MahasiswaDashboard::class, 'index'])->name('dashboard');
    Route::get('/pengaduan/create', [MahasiswaPengaduan::class, 'create'])->name('pengaduan.create');
    Route::post('/pengaduan', [MahasiswaPengaduan::class, 'store'])->name('pengaduan.store');
    Route::get('/pengaduan/{id}', [MahasiswaPengaduan::class, 'show'])->name('pengaduan.show');
});

// Routes Admin (harus login)
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::get('/pengaduan', [AdminPengaduan::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/{id}', [AdminPengaduan::class, 'show'])->name('pengaduan.show');
    Route::post('/pengaduan/{id}/tanggapi', [AdminPengaduan::class, 'tanggapi'])->name('pengaduan.tanggapi');
});
