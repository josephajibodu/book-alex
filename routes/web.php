<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'p'], function () {
    Route::redirect('/', '/');

    Route::get('{profile:slug}', [ProfileController::class, 'show'])->name('profile');

    Route::get('{profile:slug}/galleries', [ProfileController::class, 'galleries'])->name('profile.galleries');

    Route::get('{profile:slug}/booking', [ProfileController::class, 'booking'])->name('profile.booking');
});

Route::get('house-rules', function () {
    return view('house-rules');
})->name('house-rules');
