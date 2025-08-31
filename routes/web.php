<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth', 'web'])->prefix('admin')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    require __DIR__ . '/patient.php';
    require __DIR__ . '/statistic.php';
    require __DIR__ . '/visit.php';
});

require __DIR__ . '/auth.php';
