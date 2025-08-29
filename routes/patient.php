<?php

use App\Http\Controllers\Patient\Create;
use App\Http\Controllers\Patient\Delete;
use App\Http\Controllers\Patient\Edit;
use App\Http\Controllers\Patient\Index;
use App\Http\Controllers\Patient\Show;
use App\Http\Controllers\Patient\Store;
use App\Http\Controllers\Patient\Update;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'web'])->prefix('admin')->name('admin.patients.')->group(function () {
    Route::get('/patients', Index::class)->name('index');
    Route::get('/patients/create', Create::class)->name('create');
    Route::post('/patients', Store::class)->name('store');
    Route::get('/patients/{patient}', Show::class)->name('show');
    Route::get('/patients/{patient}/edit', Edit::class)->name('edit');
    Route::put('/patients/{patient}', Update::class)->name('update');
    Route::delete('/patients/{patient}', Delete::class)->name('destroy');
});