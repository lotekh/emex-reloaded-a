<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'plain_name',
        'sub_title',
        'category_page_description',
        'category_page_link_title',
        'category_page_title',
        'description',
        'usage_details',
        'technical_details',
        'active',
        'has_palette',
        'has_instructions',
        'has_calculus',
        'has_technical_file',
        'has_hardener',
        'h2_contact_title',
        'h3_contact_title',
        'price_disclaimer',
        'available_since',
        'is_package',
    ];

    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function slug(): MorphOne
    {
        return $this->morphOne(Slug::class, 'model');
    }

    public function seo(): MorphOne
    {
        return $this->morphOne(Seo::class, 'model');
    }

    public function jsonLd(): MorphOne
    {
        return $this->morphOne(JsonLd::class, 'model');
    }

    public function categorySubfilters(): BelongsToMany
    {
        return $this->belongsToMany(CategorySubfilter::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function wishlistUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlist_items', 'user_id', 'product_id');
    }
}
