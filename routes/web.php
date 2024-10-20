<?php

use App\Livewire\Landlord\LandlordForm;
use App\Livewire\Landlord\LandlordList;
use App\Livewire\Property\PropertyForm;
use App\Livewire\Property\PropertyList;
use App\Livewire\Tenant\LeaseForm;
use App\Livewire\Tenant\LeaseList;
use App\Livewire\Tenant\TenantForm;
use App\Livewire\Tenant\TenantList;
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

    Route::get('/tenants', TenantList::class)->name('tenants.index');
    Route::get('/tenants/create', TenantForm::class)->name('tenants.create');
    Route::get('/tenants/{id}/edit', TenantForm::class)->name('tenants.edit');
    Route::get('/tenants/{tenantId}/leases', LeaseList::class)->name('leases.list');
    Route::get('/tenants/{tenantId}/leases/create', LeaseForm::class)->name('leases.create');
    Route::get('/tenants/{tenantId}/leases/{leaseId}/edit', LeaseForm::class)->name('leases.edit');
});
require __DIR__ . '/auth.php';
