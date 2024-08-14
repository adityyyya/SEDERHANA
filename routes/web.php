<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('layout', function () {
    return view('layout.app');
})->name('layout');

Route::controller(UserController::class)->prefix('user')->group(function() {
    Route::get('/', 'index')->name('pegawai');
    Route::get('tambah', 'tambah')->name('pegawai.tambah');
    Route::post('tambah', 'simpan')->name('pegawai.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('pegawai.edit');
    Route::post('edit/{id}', 'update')->name('pegawai.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('pegawai.hapus');
});