<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('house-rules', function () {
    return view('house-rules');
})->name('house-rules');

Route::get('{profile:slug}/galleries', [ProfileController::class, 'galleries'])->name('profile.galleries');
Route::get('{profile:slug}/booking', [ProfileController::class, 'booking'])->name('profile.booking');

Route::get('{profile:slug}/{any?}', [ProfileController::class, 'show'])->where('any', '.*')->name('profile');