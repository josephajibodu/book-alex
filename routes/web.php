<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::get('natasha', function () {
    return view('natasha');
})->name('natasha');

Route::get('natasha-galleries', function () {
    return view('natasha-galleries');
})->name('natasha.galleries');

Route::get('booking', function () {
    return view('booking');
});

Route::get('house-rules', function () {
    return view('house-rules');
});

require __DIR__.'/auth.php';
