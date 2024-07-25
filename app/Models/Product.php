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
//$table->string('slug')->unique();
//$table->string('name');
//$table->string('plain_name')->nullable();
//$table->string('sub_title')->nullable();
//$table->string('category_page_title')->nullable();
//$table->string('category_page_link_title')->nullable();
//$table->string('h2_contact_title')->nullable();
//$table->string('h3_contact_title')->nullable();
//$table->string('price_disclaimer')->nullable();
//
//$table->text('category_page_description')->nullable();
//$table->text('description')->nullable();
//$table->text('usage_details')->nullable();
//$table->text('technical_details')->nullable();
//
//$table->boolean('active')->default(0);
//$table->boolean('has_palette')->default(1);
//$table->boolean('has_instructions')->default(1);
//$table->boolean('has_calculus')->default(1);
//$table->boolean('has_technical_file')->default(1);
//$table->boolean('has_hardener')->default(1);
//$table->boolean('is_package')->nullable();
//
//$table->json('seo')->nullable();
//$table->json('jsonld')->nullable();
//$table->json('consumption')->nullable();
//
//$table->date('available_since')->nullable();
    protected $fillable = [
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
    ];

    protected $casts = [
        'seo' => 'object',
        'jsonld' => 'object',
        'consumption' => 'object',
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
}
