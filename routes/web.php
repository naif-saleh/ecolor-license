<?php

use App\Livewire\Company\CompanyCreate;
use App\Livewire\Company\CompanyList;
use App\Livewire\Company\CompanyShow;
use App\Livewire\Company\CompanySoftdeletes;
use App\Livewire\Company\CompanyUpdate;
use App\Livewire\Licens\LicensCreate;
use App\Livewire\Licens\LicensList;
use App\Livewire\Licens\LicensShow;
use App\Livewire\Licens\LicensUpdate;
use App\Livewire\Licens\SoftDaletes;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/welcom', function () {
    return view('welcome');
})->name('home');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    //Settings Routes
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    //Licens Route
    Route::get('licens', LicensList::class)->name('licens.list');
    Route::get('licens/create', LicensCreate::class)->name('licens.create');
    Route::get('licens/update/{id}', LicensUpdate::class)->name('licens.update');
    Route::get('licens/softdelete', SoftDaletes::class)->name('licens.softdelete');
    Route::get('licens/show/{id}', LicensShow::class)->name('licens.show');

    //Company Route
    Route::get('company/companies-list', CompanyList::class)->name('company.list');
    Route::get('company/create-company', CompanyCreate::class)->name('company.create');
    Route::get('company/edit-company/{id}', CompanyUpdate::class)->name('company.edit');
    Route::get('company/show-company/{id}', CompanyShow::class)->name('company.show');
    Route::get('company/softdelete', CompanySoftdeletes::class)->name('company.softdelete');


});

require __DIR__.'/auth.php';
