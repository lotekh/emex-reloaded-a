<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
