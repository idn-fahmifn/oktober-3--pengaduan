<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelaporController;
use App\Http\Controllers\TanggapanController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
return view('auth.login');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(AdminMiddleware::class);
Route::get('halaman-pengaduan', [PelaporController::class, 'index'])->name('pengaduan');
Route::resource('laporan', LaporanController::class);
Route::resource('tanggapan', TanggapanController::class)->middleware(AdminMiddleware::class);



/**
 * 
 * Notes :
 * ==============================================================
 * Menambahkan fitur (CRUD) :
 * 1. Membuat migration (tabel yang dibutuhkan)
 * 2. Membuat model dan controller 
    - jika resource (php artisan make:model Nama -r)
    - jika bukan resource php artisan make:model Nama
 * 3. Membuat halamannya di folder resource/view
 * 4. Membuat routing di web.php (methodnya disesuaikan).
 * 
 * 
 * */

