<?php

namespace App\Traits;

use App\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasSeoImages
{
    public function seoOgImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'og_image_id', 'id');
    }

    public function seoTwitterImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'twitter_image_id', 'id');
    }
}