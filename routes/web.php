<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingSubmitted;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('house-rules', function () {
    return view('house-rules');
})->name('house-rules');


// Test email route - only in development
Route::get('/test-email', function () {
    $booking = (object)[
        'name' => 'Test User',
        'email' => 'test@example.com',
        'phone' => '1234567890',
        'date' => '2024-03-20',
        'time' => '14:00',
        'duration' => '2 hours',
        'location' => 'Test Location',
        'message' => 'This is a test booking message.'
    ];

    Mail::to('admin@example.com')->send(new \App\Mail\BookingSubmitted($booking));

    return 'Test email sent!';
});


Route::get('{profile:slug}/galleries', [ProfileController::class, 'galleries'])->name('profile.galleries');
Route::get('{profile:slug}/booking', [ProfileController::class, 'booking'])->name('profile.booking');

Route::get('{profile:slug}/{any?}', [ProfileController::class, 'show'])->where('any', '.*')->name('profile');
