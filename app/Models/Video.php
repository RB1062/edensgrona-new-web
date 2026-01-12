<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Video extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Register media collections
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('video')
             ->singleFile()
             ->acceptsMimeTypes(['video/mp4', 'video/mpeg', 'video/quicktime', 'video/x-msvideo']);

        $this->addMediaCollection('thumbnail')
             ->singleFile()
             ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp']);
    }

    // Register media conversions
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
             ->width(400)
             ->height(300)
             ->nonQueued();
    }

    // Accessor for video URL
    public function getVideoUrlAttribute()
    {
        return $this->getFirstMediaUrl('video');
    }

    // Accessor for thumbnail URL
    public function getThumbnailUrlAttribute()
    {
        return $this->getFirstMediaUrl('thumbnail');
    }

    // Helper method to check if video has media
    public function hasVideo(): bool
    {
        return $this->hasMedia('video');
    }

    // Helper method to check if video has thumbnail
    public function hasThumbnail(): bool
    {
        return $this->hasMedia('thumbnail');
    }

    // Scope for active videos
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for ordered videos
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
