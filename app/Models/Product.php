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
        'large_image_id',
        'small_image_id',
        'png_small_image_id',
        'png_large_image_id',
        'technical_file_id',
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
        'consumption_details'
    ];

    protected $casts = [
        'seo' => 'json',
        'jsonld' => 'json',
        'consumption' => 'json',
        'consumption_seo' => 'json',
        'consumption_jsonld' => 'json',
    ];

    protected $with = [
        'variations'
    ];

    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_products', 'product_id', 'category_id');
    }

    public function getPaletaCuloriUrl()
    {
        $productCategory = $this->categories()->first();

        if (!$productCategory) {
            return url('/cartela-culori-ral-vopsele');
        }

        switch ($productCategory->category_id) {
            case 1:
            case 3:
                return url('/cartela-culori-lavabile');
            default:
                return url('/cartela-culori-ral-vopsele');
        }
    }

    public function categoryfilters(): BelongsToMany
    {
        return $this->belongsToMany(CategoryFilter::class, 'category_filters_products', 'product_id', 'category_filter_id');
    }


    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function wishlistUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlist_items', 'user_id', 'product_id');
    }

    public function largeImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'large_image_id', 'id');
    }

    public function smallImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'small_image_id', 'id');
    }

    public function pngSmallImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'png_small_image_id', 'id');
    }

    public function pngLargeImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'png_large_image_id', 'id');
    }

    public function technicalFile(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'technical_file_id', 'id');
    }

    public function seoOgImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'og_image_id', 'id');
    }

    public function seoTwitterImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'twitter_image_id', 'id');
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
