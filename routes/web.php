<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/mahasiswa/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/mahasiswa/create', [CreateController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa/store', [CreateController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/{id}/edit', [CreateController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/{id}/update', [CreateController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/{id}/delete', [CreateController::class, 'delete'])->name('mahasiswa.delete');


