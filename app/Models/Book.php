<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Book extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    // Model relationships
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    // ---------------------------------------------------
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'statuts_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'book_id');
    }

    // Business logic for model -----------------------------------
    public function isAllowedToEdit(User $user): bool
    {
        if ($user->superadmin) {
            return true;
        }

        return $user->id == $this->user_id;
    }

    // Custom methods ----------------------------------------------
    public function getCardImageUrl()
    {
        if ($this->media->first() === null) {
            return '/img/default-book.jpg';
        }

        return $this->media->first()?->getUrl('card');
    }

    public function getFeaturedImageUrl()
    {
        if ($this->media->first() === null) {
            return '/img/default-book.jpg';
        }

        return $this->media->first()?->getUrl('features');
    }

    // Media library logic -----------------------------------------
    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 100, 150)
            ->nonQueued();
        $this
            ->addMediaConversion('card')
            ->fit(FIT::Crop, 200, 250)
            ->nonQueued();
        $this
            ->addMediaConversion('features')
            ->fit(FIT::Crop, 300, 350)
            ->nonQueued();
    }
}
