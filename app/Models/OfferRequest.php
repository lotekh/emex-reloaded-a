<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'address',
        'surface',
        'usage',
        'application',
        'message',
        'interior_exterior',
        'file_id',
    ];

    public function file()
    {
        return $this->belongsTo(Media::class, 'file_id', 'id');
    }

}
