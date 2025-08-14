<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DiscountCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'percentage',
        'is_active',
    ];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'discount_code_order')
                    ->withTimestamps();
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'discount_code_product')
                    ->withTimestamps();
    }

}
