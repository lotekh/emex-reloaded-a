<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'delivery_county_id',
        'person_county_id',
        'company_county_id',
        'discount_code_id',
        'guid',
        'identifier',
        'payment_method',
        'transport_price',
        'transport_price_no_tva',
        'total_no_tva',
        'total',
        'delivery_type',
        'billing_type',
        'is_paid',
        'contact_information',
        'delivery_information',
        'company_information',
    ];

    protected $casts = [
        'contact_information' => 'object',
        'delivery_information' => 'object',
        'company_information' => 'object',
    ];

    public function productVariations(): BelongsToMany
    {
        return $this->belongsToMany(ProductVariation::class);
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function discountCode(): BelongsTo
    {
        return $this->belongsTo(DiscountCode::class,);
    }

    public function deliveryCounty(): belongsTo
    {
        return $this->belongsTo(County::class, 'id', 'delivery_county_id');
    }

    public function personCounty(): HasOne
    {
        return $this->hasOne(County::class, 'id', 'person_county_id');
    }

    public function companyCounty(): HasOne
    {
        return $this->hasOne(County::class, 'id', 'company_county_id');
    }
}
