<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryFilter extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function children(): HasMany
    {
        return $this->hasMany(CategoryFilter::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(CategoryFilter::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
