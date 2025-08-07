<?php

namespace App\Models;

use App\Traits\HasSeoImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BlogArticle extends Model
{
    use HasFactory, HasSeoImages;

    protected $fillable = [
        'featured_image_id',
        'title',
        'slug',
        'body',
        'seo',
        'jsonld',
        'sort_order', 
        'is_active',
    ];

    protected $casts = [
        'seo' => 'json',
        'jsonld' => 'json'
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'blog_articles_tags', 'blog_article_id', 'tag_id');
    }

    public function featuredImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'featured_image_id', 'id');
    }
}
