<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Order;


class TransferCartOnLogout
{
    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        $user = $event->user;

        // Găsește comanda neplătită a utilizatorului
        $order = Order::where('user_id', $user->id)->where('is_paid', false)->first();

        if ($order) {
            // Setați user_id-ul la null pentru comanda curentă
            $order->user_id = null;
            $order->company_information = null;
            $order->delivery_information = null;
            $order->save();
        }
    }
}
