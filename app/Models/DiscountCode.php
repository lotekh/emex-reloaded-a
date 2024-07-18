<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DiscountCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'percentage',
        'is_active'
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
