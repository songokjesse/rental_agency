<?php

use App\Livewire\Landlord\LandlordForm;
use App\Livewire\Landlord\LandlordList;
use App\Livewire\Property\PropertyForm;
use App\Livewire\Property\PropertyList;
use App\Livewire\Units\UnitForm;
use App\Livewire\Units\UnitList;
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

    Route::get('/properties', PropertyList::class)->name('properties.index');
    Route::get('/properties/create', PropertyForm::class)->name('properties.create');
    Route::get('/properties/{id}/edit', PropertyForm::class)->name('properties.edit');
    Route::get('/properties/{propertyId}/units', UnitList::class)->name('units.list');
    Route::get('/properties/{propertyId}/units/create', UnitForm::class)->name('units.create');
    Route::get('/properties/{propertyId}/units/{unitId}/edit', UnitForm::class)->name('units.edit');
});
require __DIR__ . '/auth.php';
