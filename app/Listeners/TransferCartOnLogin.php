<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Order;

class TransferCartOnLogin
{
    /**
     * Create the event listener.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;

        // Verifică dacă există o comandă fără user_id și neplătită
        $guestOrder = Order::where('user_id', null)->where('is_paid', false)->first();

        if ($guestOrder) {
            // Asignează user_id-ul utilizatorului logat la comanda găsită
            $guestOrder->user_id = $user->id;
            $guestOrder->save();
        }
    }
}
