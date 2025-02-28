<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends \Awcodes\Curator\Models\Media
{
    use HasFactory;

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
    ];
}
