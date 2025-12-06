<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Class Profile
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $intro
 * @property string $about_me
 * @property mixed $hobbies
 * @property bool $is_active
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Profile extends Model implements HasMedia
{
    use InteractsWithMedia, Notifiable;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery')
            ->useDisk('public');

        $this->addMediaCollection('featured')
            ->useDisk('public');

        $this->addMediaCollection('featured_video')
            ->useDisk('public')
            ->acceptsMimeTypes(['video/mp4', 'video/webm', 'video/ogg', 'video/quicktime']);

        $this->addMediaCollection('bookings')
            ->useDisk('public');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

    public function routeNotificationForMail()
    {
        return $this->email;
    }
}