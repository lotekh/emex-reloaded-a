<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'gender',
        'address',
        'postal_code',
        'city',
        'ip',
        'message',
        'date_of_birth',
        'cv_id',
    ];

    public function cv()
    {
        return $this->belongsTo(Media::class, 'cv_id');
        // return $this->belongsTo(Media::class, 'cv_id'. 'id');
    }
}
