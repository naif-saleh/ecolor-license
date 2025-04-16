<?php

use App\Livewire\Licens\LicensCreate;
use App\Livewire\Licens\LicensList;
use App\Livewire\Licens\LicensUpdate;
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
    Route::get('licens/{licens}/edit', LicensUpdate::class)->name('licens.edit');


});

require __DIR__.'/auth.php';
