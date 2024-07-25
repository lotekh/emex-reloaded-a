<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'active',
        'seo',
        'jsonld'
    ];

    protected $casts = [
        'seo' => 'object',
        'jsonld' => 'object'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'categories_products', 'category_id', 'product_id');
    }
}
