<?php

use App\Livewire\Landlord\LandlordForm;
use App\Livewire\Landlord\LandlordList;
use Illuminate\Support\Facades\Route;


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::view('/', 'dashboard')
        ->name('dashboard');

    Route::get('/landlords',LandlordList::class)->name('landlords.index');
    Route::get('/landlords/create', LandlordForm::class)->name('landlords.create');
    Route::get('/landlords/{id}/edit', LandlordForm::class)->name('landlords.edit');
});
require __DIR__ . '/auth.php';
