<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'measurement_unit_id',
        'quantity',
        'colour',
        'price',
        'name',
        'addon_text',
        'ean',
        'sku',
        'weight',
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }

    public function measurementUnit(): HasOne
    {
        return $this->hasOne(MeasurementUnit::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }
}
