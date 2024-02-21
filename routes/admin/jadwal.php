<?php

use App\Http\Controllers\Admin\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['prefix' => 'kalender'], function (){
        Route::get('/', [ScheduleController::class, 'index'])->name('kalender.index');
    });
});
