<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\WishlistItem;
use Illuminate\Http\Request;


class WishlistController extends Controller
{

    public function index()
    {
        // Obține utilizatorul autentificat
        $user = Auth::user();
        
        // Obține produsele din wishlist pentru utilizatorul curent
        $products = WishlistItem::where('user_id', $user->id)->with('product')->get()->pluck('product');
        
        // Returnează view-ul cu produsele din wishlist
        return view('products.wishlist', compact('products'));
    }

    public function remove(Request $request)
    {
        $userId = auth()->id(); // ID-ul utilizatorului curent
        $productId = $request->query('product_id');

        // Verifică dacă produsul este în wishlist
        $existingItem = WishlistItem::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($existingItem) {
            // Elimină produsul din wishlist
            $existingItem->delete();
        }

        return redirect()->back()->with('success', 'Produsul a fost eliminat din favorite.');
    }

    public function store(Request $request)
    {
        // dd(12);
        $userId = auth()->id(); // ID-ul utilizatorului curent
        $productId = $request->input('product_id');

        // Verifică dacă produsul nu este deja în wishlist
        $existingItem = WishlistItem::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if (!$existingItem) {
            // Adaugă produsul în wishlist
            WishlistItem::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);
        }

        return redirect()->back()->with('success', 'Produsul a fost adăugat la favorite.');
    }
}


