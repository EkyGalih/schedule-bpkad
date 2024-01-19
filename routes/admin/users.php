<?php

use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['prefix' => 'pengguna'], function () {
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::post('store', [UsersController::class, 'store'])->name('users.store');
        Route::put('update/{id}', [UsersController::class, 'update'])->name('users.update');
        Route::get('destroy/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
    });
});
