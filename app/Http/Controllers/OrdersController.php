<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('is_paid', false)->first();

        if (!$order) {
            $ordered_products = [];
        } else {
            $ordered_products = $order->productVariations()->with('product')->get();
        }

        return view('products.ordered-products', compact('ordered_products', 'order'));
    }

    public function addProduct(Request $request)
    {
        $user = Auth::user();
        $productVariation = ProductVariation::findOrFail($request->input('product_id'));

        $order = Order::firstOrCreate(
            ['user_id' => $user->id, 'is_paid' => false],
            ['total' => 0]
        );

        // Verificăm dacă produsul există deja în comandă
        $existingOrderProduct = $order->productVariations()->where('product_variation_id', $productVariation->id)->first();

        if ($existingOrderProduct) {
            // Actualizăm cantitatea și prețul
            $existingOrderProduct->pivot->quantity += $request->input('quantity', 1);
            $existingOrderProduct->pivot->price = $productVariation->price;
            $existingOrderProduct->pivot->price_no_vat = $productVariation->price_no_vat ?? 0; // Setăm la 0 dacă este NULL
            $existingOrderProduct->pivot->save();
        } else {
            // Adăugăm noul produs în comandă
            $order->productVariations()->attach($productVariation->id, [
                'quantity' => $request->input('quantity', 1),
                'price' => $productVariation->price,
                'price_no_vat' => $productVariation->price_no_vat ?? 0, // Setăm la 0 dacă este NULL
            ]);
        }

        // Recalculăm totalul comenzii
        $order->total = $order->productVariations->sum(function ($product) {
            return $product->pivot->quantity * $product->pivot->price;
        });
        $order->save();

        return redirect()->route('orders.index');
    }


    public function removeProduct(Request $request)
    {
        // dd('Method accessed');

        $user = Auth::user();
        $order = $user->orders()->where('is_paid', false)->first();
        
        if ($order) {
            $orderProduct = $order->productVariations()->wherePivot('id', $request->input('order_product_id'))->firstOrFail();

            $order->productVariations()->detach($orderProduct->id);
    
            if ($order->productVariations()->count() == 0) {
                $order->delete();
            } else {
                $order->total = $order->productVariations->sum(function ($product) {
                    return $product->pivot->quantity * $product->pivot->price;
                });
                $order->save();
            }
        }
    
        return redirect()->route('orders.index');
    }
    


    public function emptyCart()
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('is_paid', false)->first();

        if ($order) {
            $order->productVariations()->detach();
            $order->delete();
        }

        return redirect()->route('orders.index');
    }

    public function checkout()
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('is_paid', false)->first();

        if ($order) {
            $order->is_paid = true;
            $order->save();

            return redirect()->route('thank-you');
        }

        return redirect()->route('orders.index');
    }
}
