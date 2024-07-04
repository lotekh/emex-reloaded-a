<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',
        'model_type',
        'title',
        'meta_keywords',
        'meta_description',
        'og_title',
        'og_image',
        'og_image_secure_url',
        'og_image_image_width',
        'og_image_image_height',
        'og_image_image_alt',
        'og_description',
        'twitter_image',
        'twitter_image_alt',
        'twitter_title',
        'twitter_description',
    ];
}
