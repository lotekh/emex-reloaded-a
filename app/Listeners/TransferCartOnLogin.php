<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Order;
use App\Models\ProductVariation;
use Illuminate\Support\Facades\Session;

class TransferCartOnLogin
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        
        // Preia coșul din sesiune
        $cart = Session::get('cart', []);

        if (!empty($cart)) {
            // Caută sau creează o comandă neplătită pentru utilizator
            $order = Order::firstOrCreate(
                ['user_id' => $user->id, 'is_paid' => false],
                ['total' => 0]
            );

            foreach ($cart as $item) {
                $productVariation = ProductVariation::find($item['product_variation_id']);
                $this->addToOrder($order, $productVariation, $item['quantity']);
            }

            // Șterge coșul din sesiune
            Session::forget('cart');
        }
    }

    protected function addToOrder(Order $order, ProductVariation $productVariation, $quantity)
    {
        $price = $productVariation->price;
        $price_no_vat = $price * 0.81;

        $existingOrderProduct = $order->productVariations()->where('product_variation_id', $productVariation->id)->first();

        if ($existingOrderProduct) {
            $existingOrderProduct->pivot->quantity += $quantity;
            $existingOrderProduct->pivot->price = $price;
            $existingOrderProduct->pivot->price_no_vat = $price_no_vat;
            $existingOrderProduct->pivot->save();
        } else {
            $order->productVariations()->attach($productVariation->id, [
                'quantity' => $quantity,
                'price' => $price,
                'price_no_vat' => $price_no_vat,
            ]);
        }

        $order->total = $order->productVariations->sum(function ($product) {
            return $product->pivot->quantity * $product->pivot->price;
        });

        $order->save();
    }
}
