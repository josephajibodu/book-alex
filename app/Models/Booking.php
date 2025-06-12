<?php

namespace App\Models;

use App\Notifications\NewBookingNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Profile;

class Booking extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'booking_date' => 'datetime',
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($booking) {
            $booking->profile->notify(new NewBookingNotification($booking));
        });
    }
}