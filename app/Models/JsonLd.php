<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JsonLd extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',
        'model_type',
        'description',
        'image_width',
        'image_height'
    ];
}
