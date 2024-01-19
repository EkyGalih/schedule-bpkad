<?php

use App\Http\Controllers\Admin\BidangController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['prefix' => 'bidang'], function () {
        Route::get('/', [BidangController::class, 'index'])->name('bidang.index');
        Route::post('store', [BidangController::class, 'store'])->name('bidang.store');
        Route::put('update/{id}', [BidangController::class, 'update'])->name('bidang.update');
        Route::get('destroy/{id}', [BidangController::class, 'destroy'])->name('bidang.destroy');
    });
});
