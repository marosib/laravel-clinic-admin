<?php

use App\Http\Controllers\Statistic\Index;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'web'])->prefix('admin')->name('admin.statistics.')->group(function () {
    Route::get('/statistics', Index::class)->name('index');
});