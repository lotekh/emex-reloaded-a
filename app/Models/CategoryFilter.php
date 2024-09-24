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

    protected $fillable = ['name', 'category_filter_id'];

    public function children(): HasMany
    {
        return $this->hasMany(CategoryFilter::class, 'category_filter_id', 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(CategoryFilter::class, 'id', 'category_filter_id');
    }

    // public function products(): BelongsToMany
    // {
    //     return $this->belongsToMany(Product::class);
    // }

    public function products(): BelongsToMany
{
    return $this->belongsToMany(Product::class, 'category_filters_products', 'category_filter_id', 'product_id');
}

}
