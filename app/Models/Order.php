<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'delivery_county_id',
        'person_county_id',
        'company_county_id',
        'discount_code_id',
        'guid',
        'identifier',
        'payment_method',
        'transport_price',
        'transport_price_no_tva',
        'total_no_tva',
        'total',
        'delivery_type',
        'billing_type',
        'is_paid',
        'contact_information',
        'delivery_information',
        'company_information',
    ];

    protected $casts = [
        'contact_information' => 'object',
        'delivery_information' => 'object',
        'company_information' => 'object',
    ];

     // Setarea valorii implicite pentru diverse câmpuri
     protected static function boot()
     {
         parent::boot();
 
         static::creating(function ($order) {
             if (empty($order->guid)) {
                 $order->guid = (string) Str::uuid(); // Generează un GUID unic
             }
 
             if (empty($order->identifier)) {
                 $order->identifier = strtoupper(Str::random(10)); // Generează un identifier unic
             }
 
             if (empty($order->payment_method)) {
                 $order->payment_method = 'cash'; // Valoare implicită pentru metoda de plată
             }
 
             if (empty($order->transport_price)) {
                 $order->transport_price = 0; // Valoare implicită pentru prețul transportului
             }
 
             if (empty($order->transport_price_no_tva)) {
                 $order->transport_price_no_tva = 0; // Valoare implicită pentru prețul transportului fără TVA
             }
 
             if (empty($order->total_no_tva)) {
                 $order->total_no_tva = 0; // Valoare implicită pentru totalul fără TVA
             }
 
             if (empty($order->total)) {
                 $order->total = 0; // Valoare implicită pentru total
             }
 
             if (empty($order->delivery_type)) {
                 $order->delivery_type = 1; // Valoare numerică pentru "standard"
             }
 
             if (empty($order->billing_type)) {
                 $order->billing_type = 1; // Valoare numerică pentru "personal"
             }
 
             if (empty($order->is_paid)) {
                 $order->is_paid = false; // Valoare implicită pentru statusul plății
             }
         });
     }

    public function productVariations(): BelongsToMany
    {
        return $this->belongsToMany(ProductVariation::class, 'orders_product_variations')
                    ->withPivot('id', 'quantity', 'price', 'price_no_vat');
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function discountCode(): BelongsTo
    {
        return $this->belongsTo(DiscountCode::class,);
    }

    public function deliveryCounty(): belongsTo
    {
        return $this->belongsTo(County::class, 'id', 'delivery_county_id');
    }

    public function personCounty(): HasOne
    {
        return $this->hasOne(County::class, 'id', 'person_county_id');
    }

    public function companyCounty(): HasOne
    {
        return $this->hasOne(County::class, 'id', 'company_county_id');
    }
}
