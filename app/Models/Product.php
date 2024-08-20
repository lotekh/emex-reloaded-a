<?php

namespace App\Models;

use App\Models\WishlistItem;
use App\Traits\HasSeoImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, HasSeoImages;

    protected $fillable = [
        'og_image_id',
        'consumption_og_image_id',
        'twitter_image_id',
        'consumption_twitter_image_id',
        'featured_image_id',
        'slug',
        'name',
        'plain_name',
        'sub_title',
        'category_page_title',
        'category_page_link_title',
        'h2_contact_title',
        'h3_contact_title',
        'price_disclaimer',
        'category_page_description',
        'description',
        'usage_details',
        'technical_details',
        'active',
        'has_palette',
        'has_instructions',
        'has_calculus',
        'has_technical_file',
        'has_hardener',
        'is_package',
        'seo',
        'jsonld',
        'consumption',
        'consumption_seo',
        'consumption_jsonld',
    ];

    protected $casts = [
        'seo' => 'json',
        'jsonld' => 'json',
        'consumption' => 'json',
        'consumption_seo' => 'json',
        'consumption_jsonld' => 'json',
    ];

    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_products', 'product_id', 'category_id');
    }

    public function categoryfilters(): BelongsToMany
    {
        return $this->belongsToMany(CategoryFilter::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function wishlistUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlist_items', 'user_id', 'product_id');
    }

    public function featuredImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'featured_image_id', 'id');
    }

    public function consumptionSeoOgImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'consumption_og_image_id', 'id');
    }

    public function consumptionSeoTwitterImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'consumption_twitter_image_id', 'id');
    }

    
    public function getIsInWishlistAttribute()
    {
        if (auth()->check()) {
            return WishlistItem::where('user_id', auth()->id())
                                ->where('product_id', $this->id)
                                ->exists();
        }

        return false;
    }
}
