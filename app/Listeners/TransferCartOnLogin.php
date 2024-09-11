<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\ProductVariation;
use App\Http\Controllers\OrdersController;

class TransferCartOnLogin
{
    protected $ordersController;

    public function __construct(OrdersController $ordersController)
    {
        $this->ordersController = $ordersController;
    }

    public function handle(Login $event)
    {
        $user = $event->user;
        $cart = Session::get('cart', []);

        if (!empty($cart)) {
            $order = Order::firstOrCreate(
                ['user_id' => $user->id, 'is_paid' => false],
                ['total' => 0]
            );

            foreach ($cart as $item) {
                $productVariation = ProductVariation::find($item['product_variation_id']);
                $this->ordersController->addToOrder($order, $productVariation, $item['quantity']);
            }

            Session::forget('cart');
        }
    }
}
