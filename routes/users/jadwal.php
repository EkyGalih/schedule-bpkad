<?php

use App\Http\Controllers\Users\JadwalControllers;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users', 'middleware' => ['auth', 'users']], function () {
    Route::group(['prefix' => 'jadwal-kegiatan'], function () {
        Route::get('/', [JadwalControllers::class, 'index'])->name('jadwal-kegiatan.index');
    });
});
