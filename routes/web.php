<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeragamController;
use App\Http\Controllers\SiswaController;
use App\Models\Seragam;
use Illuminate\Http\Request;

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


Route::get('/',[SeragamController::class, 'index']);
Route::post('/', [SeragamController::class, 'operation']);

Route::get('/siswa',[SiswaController::class, 'index']);
Route::get('/cari-sis',[SiswaController::class, 'cariSiswa']);


Route::get('/filt-kls-10',[SiswaController::class, 'filtKlsSplh']);
Route::get('/filt-kls-11',[SiswaController::class, 'filtKlsSbls']);
Route::get('/filt-kls-12',[SiswaController::class, 'filtKlsDbls']);

Route::post('/store-siswa',[SiswaController::class, 'postSis']);
Route::put('/edit-siswa/{id}',[SiswaController::class, 'putSiswa']);
Route::delete('/delete-Sis/delete/{id}',[SiswaController::class, 'destroy']);



Route::get('/seragam',[SeragamController::class, 'index']);

Route::post('/store-seragam',[SeragamController::class, 'postSeragam']);
Route::put('/edit-seragam/{id}',[SeragamController::class, 'putSeragam']);
Route::delete('delete-Ser/delete/{id}',[SeragamController::class, 'destroy']);