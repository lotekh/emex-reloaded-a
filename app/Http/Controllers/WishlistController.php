<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WishlistItem;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login'); // Redirecționare la login dacă utilizatorul nu este autentificat
        }

        $wishlistItem = WishlistItem::firstOrCreate([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
        ]);

        return back()->with('success', 'Produsul a fost adăugat la wishlist.');
    }
}


