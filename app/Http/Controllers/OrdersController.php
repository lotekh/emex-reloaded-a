<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductVariation;
use App\Models\OrderProductVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('status', 'pending')->first();

        if (!$order) {
            $ordered_products = [];
        } else {
            $ordered_products = $order->products()->with('productVariation.product')->get();
        }

        return view('ordered-products', compact('ordered_products', 'order'));
    }

    public function addProduct(Request $request)
    {
        $user = Auth::user();
        $productVariation = ProductVariation::findOrFail($request->input('product_variation_id'));

        $order = Order::firstOrCreate(
            ['user_id' => $user->id, 'status' => 'pending'],
            ['total_price' => 0]
        );

        $orderProduct = $order->products()->firstOrCreate(
            ['product_variation_id' => $productVariation->id],
            ['quantity' => $request->input('quantity', 1), 'price' => $productVariation->price, 'total_price' => $productVariation->price]
        );

        $orderProduct->quantity += $request->input('quantity', 1);
        $orderProduct->total_price = $orderProduct->quantity * $orderProduct->price;
        $orderProduct->save();

        $order->total_price = $order->products->sum('total_price');
        $order->save();

        return redirect()->route('orders.index');
    }

    public function removeProduct(Request $request)
    {
        $orderProduct = OrderProductVariation::findOrFail($request->input('order_product_id'));
        $order = $orderProduct->order;

        $orderProduct->delete();

        if ($order->products()->count() == 0) {
            $order->delete();
        } else {
            $order->total_price = $order->products->sum('total_price');
            $order->save();
        }

        return redirect()->route('orders.index');
    }

    public function emptyCart()
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('status', 'pending')->first();

        if ($order) {
            $order->products()->delete();
            $order->delete();
        }

        return redirect()->route('orders.index');
    }

    public function checkout()
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('status', 'pending')->first();

        if ($order) {
            $order->status = 'completed';
            $order->save();

            return redirect()->route('thank-you');
        }

        return redirect()->route('orders.index');
    }
}
