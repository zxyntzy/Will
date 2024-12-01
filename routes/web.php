<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsensiController;

Route::redirect('/', '/absensi');
Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


Route::resource('siswa', SiswaController::class);

Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');

Route::get('/absensi-data', [AbsensiController::class, 'showData'])->name('absensi.data');

Route::delete('/absensi/{absensi}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');

Route::get('absensi/export-csv', [AbsensiController::class, 'exportCSV'])->name('absensi.exportCSV');