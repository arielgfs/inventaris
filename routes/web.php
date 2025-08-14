<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\TeknologiController;

// HOME / REDIRECT
Route::get('/', function () {
    return redirect()->route('entri.data');
});

// FORM ENTRI DATA
Route::get('input/entri-data', function () {
    return view('entri-data', [
        'klien' => \App\Models\Klien::all(),
        'aplikasi' => \App\Models\Aplikasi::all()
    ]);
})->name('entri.data');

// KLIEN - gunakan resource route (lengkap: index, create, store, show, edit, update, destroy)
Route::resource('klien', KlienController::class);

// APLIKASI
Route::get('/aplikasi/create', [AplikasiController::class, 'create'])->name('aplikasi.create');
Route::post('/aplikasi', [AplikasiController::class, 'store'])->name('aplikasi.store');
Route::get('/aplikasi/tabel', [AplikasiController::class, 'tabel'])->name('aplikasi.tabel');
Route::get('/aplikasi/gambar', [AplikasiController::class, 'gambar'])->name('aplikasi.gambar');
Route::delete('/aplikasi/{id}', [AplikasiController::class, 'destroy'])->name('aplikasi.destroy');
Route::get('/aplikasi/{id}/detail-form', [AplikasiController::class, 'detail'])->name('aplikasi.detail-form');
Route::get('/aplikasi/{id}', [AplikasiController::class, 'show'])->name('aplikasi.show');
Route::get('/aplikasi/{id}/edit', [AplikasiController::class, 'edit'])->name('aplikasi.edit');
Route::put('/aplikasi/{id}', [AplikasiController::class, 'update'])->name('aplikasi.update');


// TEKNOLOGI
Route::get('/teknologi', [TeknologiController::class, 'index'])->name('teknologi.index');
Route::resource('teknologi', TeknologiController::class);
Route::post('/teknologi', [TeknologiController::class, 'store'])->name('teknologi.store');
Route::get('/teknologi/{id}/edit', [TeknologiController::class, 'edit'])->name('teknologi.edit');
Route::put('/teknologi/{id}', [TeknologiController::class, 'update'])->name('teknologi.update');

// GALERI APLIKASI
Route::get('/galeri', [AplikasiController::class, 'index'])->name('aplikasi.index');

Route::get('/aplikasi', [AplikasiController::class, 'index'])->name('aplikasi.index');

Route::get('/klien', [KlienController::class, 'index'])->name('klien.index');
Route::get('/klien/create', [KlienController::class, 'create'])->name('klien.create');
Route::post('/klien', [KlienController::class, 'store'])->name('klien.store');
Route::delete('/klien/{id}', [KlienController::class, 'destroy'])->name('klien.destroy');

