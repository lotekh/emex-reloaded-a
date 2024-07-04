<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'active'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
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
}
