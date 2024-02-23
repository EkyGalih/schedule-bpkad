<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/kegiatan/{id}', [ApiController::class, 'kegiatan'])->name('kegiatan.get');
Route::get('/tahun/{id}', [ApiController::class, 'tahun'])->name('tahun.get');
Route::post('/jadwal', [ApiController::class, 'schedule'])->name('jadwal.store');
Route::get('/jadwals', [ApiController::class, 'getSchedule'])->name('jadwal.index');
Route::put('/updateJadwals/{id}', [ApiController::class, 'ubahJadwal'])->name('jadwal.update');
Route::put('/ubahJadwalResize/{id}', [ApiController::class, 'ubahJadwalResize'])->name('jadwal.updateResize');
Route::get('/deleteJadwal/{id}', [ApiController::class, 'deleteJadwal'])->name('jadwal.delete');
Route::get('/cekBidang/{id}', [ApiController::class, 'cekBidang'])->name('jadwal.cekBidang');
Route::get('/searchPegawai/{value}', [ApiController::class, 'searchPegawai'])->name('pegawai');
