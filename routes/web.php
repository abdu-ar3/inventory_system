<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginShow');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/home', [AuthController::class, 'home'])->name('home');

Route::resource('barang', BarangController::class);
Route::resource('barang_masuk', BarangMasukController::class);
Route::resource('barang_keluar', BarangKeluarController::class);
Route::resource('supplier', SupplierController::class);
Route::get('laporan/summary', [LaporanController::class, 'summary'])->name('laporan.summary');
Route::get('laporan/summary/export', [LaporanController::class, 'exportToPdf'])->name('laporan.summary.export');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
