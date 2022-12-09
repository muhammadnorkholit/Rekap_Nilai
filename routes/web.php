<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\JurusanController;

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

Route::resource('/admin/panel/mapel',MapelController::class );
Route::resource('/admin/panel/siswa',SiswaController::class );
Route::resource('/admin/panel/rekap',RekapController::class );
Route::resource('/admin/panel/jurusan',JurusanController::class );


<<<<<<< HEAD

Route::post('/admin/panel/rekapImport',[ImportController::class,'importRekap']);
Route::post('/admin/panel/mapelImport',[ImportController::class,'importMapel']);
Route::post('/admin/panel/jurusanImport',[ImportController::class,'importJurusan']);
=======
Route::post('/admin/panel/siswaImport',[ImportController::class,'importSiswa']);
Route::post('/admin/panel/rekapImport',[ImportController::class,'importRekap']);
>>>>>>> da867bb5cebfbd432bea598a50d5762cb640ce00
