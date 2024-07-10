<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'delivery_type',
        'delivery_last_name',
        'delivery_first_name',
        'delivery_phone',
        'delivery_county_id',
        'delivery_city_id',
        'delivery_address',
        'delivery_email',
        'billing_type',
        'person_last_name',
        'person_first_name',
        'person_phone',
        'person_county_id',
        'person_city_id',
        'person_address',
        'person_email',
        'organization_name',
        'organization_vat_code',
        'organization_bank',
        'organization_bank_account',
        'organization_county_id',
        'organization_city_id',
        'organization_address',
        'organization_phone',
        'organization_email',
        'guid',
        'payment_method',
        'total',
        'identifier',
        'is_paid',
        'transport_price',
        'transport_price_no_tva',
        'total_no_tva',
        'discount_code_id'
    ];

    public function productVariations(): BelongsToMany
    {
        return $this->belongsToMany(ProductVariation::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function code(): HasOne
    {
        return $this->hasOne(DiscountCode::class, 'id', 'discount_code_id');
    }

    public function county(): HasOne
    {
        return $this->hasOne(County::class, 'id', 'delivery_county_id');
    }

    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'delivery_city_id');
    }

    public function personCounty(): HasOne
    {
        return $this->hasOne(County::class, 'id', 'person_county_id');
    }
}
