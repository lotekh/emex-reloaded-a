<?php

namespace App\Models;

use App\Traits\HasSeoImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory, HasSeoImages;

    protected $fillable = [
        'og_image_id',
        'twitter_image_id',
        'name',
        'slug',
        'description',
        'active',
        'seo',
        'jsonld'
    ];

    protected $casts = [
        'seo' => 'json',
        'jsonld' => 'json'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'categories_products', 'category_id', 'product_id')->withPivot('order');
    }
}
