<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\realisasiController;
use App\Http\Controllers\pemohonController;
use App\Http\Controllers\printController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\mobilController;
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
    return view('auth.login');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [PemohonController::class, 'index'])->name('dashboard');
    Route::post('/pemohon', [PemohonController::class, 'create'])->name('pemohon.create');
    Route::get('/get-nomor-polisi/{idMobil}', [PemohonController::class, 'getNomorPolisi'])->name('get-nomor-polisi');
    Route::get('/get-no-polisi/{jenisMobilId}', [PemohonController::class, 'getNoPolisi']);

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [SuperAdminController::class, 'store'])->name('superadmin.store');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/realisasi', [realisasiController::class, 'index'])->name('realisasi');
    Route::get('/realisasi', [realisasiController::class, 'create'])->name('realisasi.create');
    Route::post('/realisasi', [realisasiController::class, 'store'])->name('realisasi.store');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/cetak', [printController::class, 'index'])->name('cetak');
    Route::get('/edit-data/{id_realisasi}', [printController::class, 'edit'])->name('edit-data');
    Route::put('/update-data/{id_realisasi}', [printController::class, 'update'])->name('update-data');
    Route::get('/cetak/{id_realisasi}', [printController::class, 'destroy'])->name('destroy');
    Route::get('/export-data', [PrintController::class, 'exportData'])->name('export-data');
    Route::get('/cetak-show/{id_realisasi}', [printController::class, 'show'])->name('cetak-show');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user', [userController::class, 'index'])->name('user');
    Route::get('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/{id}/activate', [UserController::class, 'activate'])->name('user.activate');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/mobil', [mobilController::class, 'index'])->name('mobil');
    Route::get('/mobil/create', [mobilController::class, 'create'])->name('mobil.create');
    Route::post('/mobil/store', [mobilController::class, 'store'])->name('mobil.store');
    Route::get('/mobil/{id_mobil}', [MobilController::class, 'destroy'])->name('mobil.destroy');
    Route::get('/mobil/edit/{id_mobil}', [MobilController::class, 'edit'])->name('mobil.edit');
    Route::put('/mobil/update/{id_mobil}', [MobilController::class, 'update'])->name('mobil.update');
});

require __DIR__.'/auth.php';