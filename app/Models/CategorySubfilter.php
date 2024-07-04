<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CategorySubfilter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'category_filter_id'
    ];

    public function categoryFilter()
    {
        return $this->hasOne(CategoryFilter::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
