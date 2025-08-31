<?php

use App\Http\Controllers\Visit\Delete;
use App\Http\Controllers\Visit\Store;
use Illuminate\Support\Facades\Route;

Route::name('admin.visits.')->group(function () {
    Route::post('/patients/{patient}/visit', Store::class)->name('store');
    Route::delete('/visits/{visit}', Delete::class)->name('destroy');
});