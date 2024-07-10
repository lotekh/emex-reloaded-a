<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'phone',
        'billing_type',
        'person_first_name',
        'person_last_name',
        'person_county_id',
        'person_city',
        'person_address',
        'person_phone',
        'person_email',
        'organization_name',
        'organization_vat_code',
        'organization_bank',
        'organization_bank_account',
        'organization_county_id',
        'organization_city',
        'organization_address',
        'organization_phone',
        'organization_email',
        'delivery_type',
        'delivery_last_name',
        'delivery_first_name',
        'delivery_phone',
        'delivery_county_id',
        'delivery_city',
        'delivery_address',
        'delivery_email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function wishlistItems(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'wishlist_items', 'product_id', 'user_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }
}
