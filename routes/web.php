<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
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
Route::middleware(['guest'])->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
    Route::get('/sesi/registrasi', [SesiController::class, 'register']);
    Route::post('/sesi/registrasi', [SesiController::class, 'create']);

});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/logout', [SesiController::class, 'logout']);
    Route::get('/reservasi', [ReservasiController::class, 'index']);
    
    Route::post('/reservasi', [ReservasiController::class, 'reservasi']);
    Route::put('/reservasi/{id}', [ReservasiController::class, 'update'])->name('reservasi.update');
    Route::delete('/reservasi/{id}', [ReservasiController::class, 'destroy'])->name('reservasi.destroy');

    Route::get('/admin', [AdminController::class, 'index'])->middleware('user.access:admin');
    Route::get('/admin/data-reservasi', [AdminController::class, 'dataReservasi'])->middleware('user.access:admin');
    Route::get('/admin/data-reservasi', [AdminController::class, 'dataReservasi'])->name('reservasi.search')->middleware('user.access:admin');

    Route::get('/admin/data-treatment', [AdminController::class, 'dataTreatment'])->middleware('user.access:admin');
    Route::get('/admin/data-treatment', [AdminController::class, 'dataTreatment'])->name('treatment.search')->middleware('user.access:admin');
    Route::post('/admin/tambah-treatment', [AdminController::class, 'tambahTreatment'])->middleware('user.access:admin');
    Route::put('/admin/update-treatment/{id}', [AdminController::class, 'updateTreatment'])->middleware('user.access:admin');
    Route::delete('/admin/hapus-treatment/{id}', [AdminController::class, 'hapusTreatment'])->middleware('user.access:admin');

    Route::get('/admin/data-karyawan', [AdminController::class, 'dataKaryawan'])->middleware('user.access:admin');
    Route::get('/admin/data-karyawan', [AdminController::class, 'dataKaryawan'])->name('karyawan.search')->middleware('user.access:admin');
    Route::post('/admin/tambah-karyawan', [AdminController::class, 'tambahKaryawan'])->middleware('user.access:admin');
    Route::put('/admin/update-karyawan/{id}', [AdminController::class, 'updateKaryawan'])->middleware('user.access:admin');
    Route::delete('/admin/hapus-karyawan/{id}', [AdminController::class, 'hapusKaryawan'])->middleware('user.access:admin');
});

Route::get('/home', function () {
    if (auth()->user()->role == 'admin') {
        return redirect('/admin');
    } else {
        return redirect('/');
    }
});
Route::get('/', [UserController::class, 'index']);


