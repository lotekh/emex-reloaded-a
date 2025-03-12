<?php

namespace App\Models;

use \Awcodes\Curator\Models\Media as CuratorMedia;

class Media extends CuratorMedia
{
    protected $fillable = [
        'url',
        'ext',
        'size',
        'type',
        'name',
        'path',
        'disk',
        'mime_type',
        'width',
        'height',
        'duration',
        'created_at',
        'updated_at',
        'alt',
        'title',
        'description',
        'caption',
    ];
}
