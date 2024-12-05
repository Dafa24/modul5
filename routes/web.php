<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
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

Route::get('/', [DosenController::class, 'index'], function () {
    return view('Dosen/Dosen');
});
Route::get('/TambahDosen', function () {
    return view('Dosen/TambahDosen');
});
Route::get('/DosenPage/addDosen', [DosenController::class, 'getCreateForm'])->name('dosen.create');
Route::post('/DosenPage/addDosen', [DosenController::class, 'store'])->name('dosen.store');
Route::get('/DosenPage/edit/{id}', [DosenController::class, 'getEditForm'])->name('dosen.edit');
Route::post('/DosenPage/update/{id}', [DosenController::class, 'update'])->name('dosen.update');
Route::delete('/DosenPage/delete/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');

Route::get('/MahasiswaPage', [MahasiswaController::class, 'index'],function () {
    return view('Mahasiswa/Mahasiswa');
});
Route::get('/Mahasiswa/edit/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.edit');
Route::post('/Mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::post('/Mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
Route::get('/Mahasiswa/add', [MahasiswaController::class, 'getCreateForm'])->name('mahasiswa.create');
Route::post('/Mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
