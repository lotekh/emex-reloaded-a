<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Consumption extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'surface_name',
        'surface_types',
        'surface_type_name',
        'script'
    ];

    public function slug(): MorphOne
    {
        return $this->morphOne(Slug::class, 'model');
    }

    public function jsonLd(): MorphOne
    {
        return $this->morphOne(JsonLd::class, 'model');
    }
}
