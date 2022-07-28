<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeragamController;
use App\Http\Controllers\SiswaController;

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

Route::get('/siswa',[SiswaController::class, 'index']);
Route::get('/cari-sis',[SiswaController::class, 'cariSiswa']);

Route::get('/asc-sis-tgl',[SiswaController::class, 'sortASCSisTgl']);
Route::get('/desc-sis-tgl',[SiswaController::class, 'sortDESCSisTgl']);

Route::get('/asc-sis-nm',[SiswaController::class, 'sortASCSisNm']);
Route::get('/desc-sis-nm',[SiswaController::class, 'sortDESCSisNm']);

Route::get('/asc-sis-kls',[SiswaController::class, 'sortASCSisKls']);
Route::get('/desc-sis-kls',[SiswaController::class, 'sortDESCSisKls']);

Route::get('/asc-sis-nisn',[SiswaController::class, 'sortASCSisNisn']);
Route::get('/desc-sis-nisn',[SiswaController::class, 'sortDESCSisNisn']);

Route::get('/asc-sis-abs',[SiswaController::class, 'sortASCSisAbs']);
Route::get('/desc-sis-abs',[SiswaController::class, 'sortDESCSisAbs']);


Route::get('/filt-kls-10',[SiswaController::class, 'filtKlsSplh']);
Route::get('/filt-kls-11',[SiswaController::class, 'filtKlsSbls']);
Route::get('/filt-kls-12',[SiswaController::class, 'filtKlsDbls']);

Route::post('/store-siswa',[SiswaController::class, 'postSis']);
Route::put('/edit-siswa/{id}',[SiswaController::class, 'putSiswa']);
Route::delete('/delete-Sis/delete/{id}',[SiswaController::class, 'destroy']);



Route::get('/seragam',[SeragamController::class, 'index']);
Route::get('/cari-ser',[SeragamController::class, 'cariSeragam']);

Route::get('/asc-ser-tgl',[SeragamController::class, 'sortASCSerTgl']);
Route::get('/desc-ser-tgl',[SeragamController::class, 'sortDESCSerTgl']);

Route::get('/asc-ser-uk',[SeragamController::class, 'sortASCSerUk']);
Route::get('/desc-ser-uk',[SeragamController::class, 'sortDESCSerUk']);

Route::get('/asc-ser-jen',[SeragamController::class, 'sortASCSerJen']);
Route::get('/desc-ser-jen',[SeragamController::class, 'sortDESCSerJen']);

Route::get('/asc-ser-har',[SeragamController::class, 'sortASCSerHar']);
Route::get('/desc-ser-har',[SeragamController::class, 'sortDESCSerHar']);


Route::get('/filter',[SeragamController::class, 'filter']);
Route::get('/filt-uk-s',[SeragamController::class, 'filtUKs']);
Route::get('/filt-uk-m',[SeragamController::class, 'filtUKm']);
Route::get('/filt-uk-l',[SeragamController::class, 'filtUKl']);
Route::get('/filt-uk-xl',[SeragamController::class, 'filtUKxl']);

Route::get('/filt-jen-ol',[SeragamController::class, 'filtJENol']);
Route::get('/filt-jen-btk',[SeragamController::class, 'filtJENbtk']);
Route::get('/filt-jen-prmk',[SeragamController::class, 'filtJENprmk']);
Route::get('/filt-jen-mslm',[SeragamController::class, 'filtJENmslm']);

Route::get('/cari-ser-filt',[SeragamController::class, 'cariSeragamFilt']);

Route::post('/store-seragam',[SeragamController::class, 'postSeragam']);
Route::put('/edit-seragam/{id}',[SeragamController::class, 'putSeragam']);
Route::delete('delete-Ser/delete/{id}',[SeragamController::class, 'destroy']);