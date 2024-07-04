<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFilter extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function categorySubfilters()
    {
        return $this->hasMany(CategorySubfilter::class);
    }
}
