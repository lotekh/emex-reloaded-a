<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class BlogArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'seo',
        'jsonld'
    ];

    protected $casts = [
        'seo' => 'object',
        'jsonld' => 'object'
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function featuredImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'featured_image_id', 'id');
    }
}
