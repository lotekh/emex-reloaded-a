<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class City extends Model
{
    protected $fillable = [
        'county_id',
        'name',
    ];

    public function county(): HasOne
    {
        return $this->hasOne(County::class);
    }
}
