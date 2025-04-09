<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProductVariation extends Model
{
    protected $fillable = [
        'order_id',
        'product_variation_id',
        'mentions',
        'quantity',
        'price',
        'price_no_vat',
    ];

    protected $table = 'orders_product_variations';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function productVariation()
    {
        return $this->belongsTo(ProductVariation::class);
    }
}
