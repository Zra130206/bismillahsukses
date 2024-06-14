<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;

Route::get('/', function () {
    return view('login');
});

Route::resource('barang', BarangController::class)->middleware('auth');
Route::resource('kategori', KategoriController::class)->middleware('auth');
Route::resource('barangmasuk', BarangMasukController::class)->middleware('auth');
Route::resource('barangkeluar', BarangKeluarController::class)->middleware('auth');

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login']);
Route::GET('logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
