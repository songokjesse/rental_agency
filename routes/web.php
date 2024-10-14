<?php

use App\Http\Controllers\LandlordController;
use Illuminate\Support\Facades\Route;


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::view('/', 'dashboard')
        ->name('dashboard');

    Route::get('/landlords', [LandlordController::class, 'index'])->name('landlords.index');
});
require __DIR__ . '/auth.php';
