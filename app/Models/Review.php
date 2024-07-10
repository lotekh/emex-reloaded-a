<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'review',
        'approved'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function __boot()
    {
        static::creating(function ($review) {
            if (! $review->user_id && auth()->user()->isAdmin()) {
                $review->user_id = auth()->id();
            }
        });
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
