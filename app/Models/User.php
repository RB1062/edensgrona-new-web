<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia, FilamentUser
{
    use HasFactory;
    use Notifiable;
    use InteractsWithMedia;

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'city',
        'postal_code',
        'customer_type',
    ];

    /**
     * Hidden attributes for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Filament v3: control who can access the admin panel.
     *
     * NOTE: This currently allows ALL authenticated users.
     * If you want admin-only access, add a column (e.g. is_admin)
     * and change this method accordingly.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return auth()->user()->email === 'admin@edensgrona.se';
    }

    /**
     * Media Library: register media collections.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
             ->singleFile()
             ->acceptsMimeTypes([
                 'image/jpeg',
                 'image/jpg',
                 'image/png',
                 'image/webp',
             ]);
    }

    /**
     * Media Library: register media conversions.
     */
    public function registerMediaConversions($media = null): void
    {
        $this->addMediaConversion('thumb')
             ->width(100)
             ->height(100)
             ->sharpen(10)
             ->nonQueued();
    }

    /**
     * Accessor: avatar thumbnail URL.
     */
    public function getAvatarUrlAttribute(): ?string
    {
        $url = $this->getFirstMediaUrl('avatar', 'thumb');

        return $url !== '' ? $url : null;
    }

    /**
     * Relationships.
     */
    public function contactSubmissions()
    {
        return $this->hasMany(ContactSubmission::class);
    }

    /**
     * Accessor: full address.
     */
    public function getFullAddressAttribute(): string
    {
        $parts = array_filter([
            $this->address,
            $this->postal_code,
            $this->city,
        ]);

        return implode(', ', $parts);
    }

    /**
     * Helpers.
     */
    public function isPrivate(): bool
    {
        return $this->customer_type === 'private';
    }

    public function isCompany(): bool
    {
        return $this->customer_type === 'company';
    }
}
