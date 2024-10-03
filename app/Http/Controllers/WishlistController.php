<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use App\Models\Product;



class WishlistController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $products = collect();

        if ($user) {
            // Obține produsele din wishlist din baza de date pentru utilizatorul logat
            $products = WishlistItem::where('user_id', $user->id)
                ->with(['product.variations', 'product.reviews']) 
                ->get()
                ->pluck('product');
        } else {
            // Obține produsele din wishlist din sesiune pentru utilizatorul nelogat
            $wishlist = session()->get('wishlist', []);
            if (!empty($wishlist)) {
                $products = Product::whereIn('id', $wishlist)
                    ->with(['variations', 'reviews'])
                    ->get();
            }
        }

        return view('products.wishlist', compact('products'));
    }



    public function remove(Request $request)
    {
        $user = auth()->user();
        $productId = $request->input('product_id');

        if ($user) {
            $existingItem = WishlistItem::where('user_id', $user->id)
                ->where('product_id', $productId)
                ->first();

            if ($existingItem) {
                $existingItem->delete();
            }
        } else {
            $wishlist = session()->get('wishlist', []);
            if (($key = array_search($productId, $wishlist)) !== false) {
                unset($wishlist[$key]);
                session()->put('wishlist', $wishlist);
            }
        }

        return redirect()->back()->with('success', 'Produsul a fost eliminat din favorite.');
    }



    public function store(Request $request)
    {
        $user = auth()->user();
        $productId = $request->input('product_id');

        if ($user) {
            $userId = $user->id;

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
        } else {
            // Dacă utilizatorul nu este autentificat, salvează în sesiune
            $wishlist = session()->get('wishlist', []);

            if (!in_array($productId, $wishlist)) {
                $wishlist[] = $productId;
                session()->put('wishlist', $wishlist);
            }
        }

        return redirect()->back()->with('success', 'Produsul a fost adăugat la favorite.');
    }

    public function moveSessionWishlistToDatabase()
    {
        $user = auth()->user();
        if (!$user) {
            return;
        }

        $wishlist = session()->get('wishlist', []);
        if (!empty($wishlist)) {
            foreach ($wishlist as $productId) {
                // Verifică dacă produsul nu este deja în wishlist-ul din baza de date
                $existingItem = WishlistItem::where('user_id', $user->id)
                    ->where('product_id', $productId)
                    ->first();

                if (!$existingItem) {
                    // Adaugă produsul în wishlist
                    WishlistItem::create([
                        'user_id' => $user->id,
                        'product_id' => $productId,
                    ]);
                }
            }

            // Golește wishlist-ul din sesiune
            session()->forget('wishlist');
        }
    }

        public function getWishlistCount()
    {
        $user = auth()->user();
        $wishlistCount = 0;

        if ($user) {
            // Dacă utilizatorul este logat, numără produsele din wishlist-ul din baza de date
            $wishlistCount = WishlistItem::where('user_id', $user->id)->count();
        } else {
            // Dacă utilizatorul nu este logat, numără produsele din wishlist-ul din sesiune
            $wishlist = session()->get('wishlist', []);
            $wishlistCount = count($wishlist);
        }

        return $wishlistCount;
    }

    public function isInWishlist($productId)
    {
        $user = Auth::user();

        if ($user) {
            // Verifică în baza de date
            return WishlistItem::where('user_id', $user->id)
                                ->where('product_id', $productId)
                                ->exists();
        } else {
            // Verifică în sesiune
            $wishlist = session()->get('wishlist', []);
            return in_array($productId, $wishlist);
        }
    }




}


