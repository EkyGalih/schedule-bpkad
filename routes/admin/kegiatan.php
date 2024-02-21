<?php

use App\Http\Controllers\Admin\KegiatanController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['prefix' => 'kegiatan'], function () {
        Route::get('/', [KegiatanController::class, 'index'])->name('kegiatan.index');
        Route::post('store', [KegiatanController::class, 'store'])->name('kegiatan.store');
        Route::put('update/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
        Route::get('destroy/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
    });
});
