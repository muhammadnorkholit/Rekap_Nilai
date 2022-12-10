<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

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

Route::get('/auth/login',[AuthController::class,'index'])->name('login')->middleware('guest');
Route::post('/auth/login',[AuthController::class,'loginCheck']);

Route::get('/', function () {
    return redirect('/auth/login');
});

Route::middleware(['auth'])->group(function () {
<<<<<<< HEAD
    
Route::resource('/admin/panel/mapel',MapelController::class );
Route::resource('/admin/panel/siswa',SiswaController::class );
Route::resource('/admin/panel/rekap',RekapController::class );
Route::resource('/admin/panel/jurusan',JurusanController::class );
Route::resource('/admin/panel/operator',OperatorController::class );
=======
    Route::get('/logout',[AuthController::class,'logout']);
    Route::resource('/admin/panel/mapel',MapelController::class );
    Route::resource('/admin/panel/siswa',SiswaController::class );
    Route::resource('/admin/panel/rekap',RekapController::class );
    Route::resource('/admin/panel/jurusan',JurusanController::class );
>>>>>>> 9fd4b16bc9befcddf6a3f76829af972f12655e15

    Route::get('/admin/panel',[DashboardController::class,'index']);

    Route::post('/admin/panel/rekapImport',[ImportController::class,'importRekap']);
    Route::post('/admin/panel/mapelImport',[ImportController::class,'importMapel']);
    Route::post('/admin/panel/jurusanImport',[ImportController::class,'importJurusan']);

    Route::post('/admin/panel/siswaImport',[ImportController::class,'importSiswa']);
    Route::post('/admin/panel/rekapImport',[ImportController::class,'importRekap']);
    Route::post('/admin/panel/siswaImport',[ImportController::class,'importSiswa']);


    Route::get('/admin/panel/rekapExport',[ExportController::class,'exportRekap']);

});




