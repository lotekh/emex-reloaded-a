<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
// use Illuminate\Http\Response;
use App\Models\Country;
use App\Models\County;
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
    // dd(1);
    $user = Auth::user();
    $productVariation = ProductVariation::findOrFail($request->input('product_id'));

    $order = Order::firstOrCreate(
        ['user_id' => $user->id, 'is_paid' => false],
        ['total' => 0]
    );

    $price = $productVariation->price;
    $price_no_vat = $price * 0.81; // Calculate price without VAT as 81% of the price

    // Check if the product already exists in the order
    $existingOrderProduct = $order->productVariations()->where('product_variation_id', $productVariation->id)->first();

    if ($existingOrderProduct) {
        // Update the quantity and price
        $existingOrderProduct->pivot->quantity += $request->input('quantity', 1);
        $existingOrderProduct->pivot->price = $price;
        $existingOrderProduct->pivot->price_no_vat = $price_no_vat; // Update price_no_vat with the calculated value
        $existingOrderProduct->pivot->save();
    } else {
        // Add the new product to the order
        $order->productVariations()->attach($productVariation->id, [
            'quantity' => $request->input('quantity', 1),
            'price' => $price,
            'price_no_vat' => $price_no_vat, // Set price_no_vat with the calculated value
        ]);
    }

    // Recalculate the order total
    $order->total = $order->productVariations->sum(function ($product) {
        return $product->pivot->quantity * $product->pivot->price;
    });
    $order->save();

    // return redirect()->route('orders.index');
    return redirect()->back();

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
    
    public function getTransportPrice(Request $request)
    {
        // Obține ID-ul județului din cerere
        $countyId = $request->query('county_id');

        // dd($countyId);

        // logica pentru calcularea prețului transportului
        $transportPrices = [
            1 => 10.00, // Exemplu: preț pentru județul cu ID-ul 1
            2 => 15.00, // Exemplu: preț pentru județul cu ID-ul 2
            3 => 20.00, // Exemplu: preț pentru județul cu ID-ul 3
        ];

        // Setează prețul în funcție de județul selectat
        $price = isset($transportPrices[$countyId]) ? $transportPrices[$countyId] : 25.00; 
        // Preț default dacă ID-ul județului nu este găsit

        // Calculează TVA-ul
        $tva = $price * 0.19;

        // Formatează prețul și TVA-ul pentru a avea două zecimale
        $formattedPrice = number_format($price, 2, '.', '');
        $formattedTva = number_format($tva, 2, '.', '');

        // Returnează un array cu valorile calculului
        return response()->json([
            'price' => $formattedPrice,
            'tva' => $formattedTva,
            'total' => number_format($price + $tva, 2, '.', '')
        ]);
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

    public function showCheckoutForm(Request $request)
    {
        $user = auth()->user();
        // Determinăm dacă utilizatorul este oaspete (guest)
        $isGuest = auth()->guest();
        $order = Order::where('user_id', $user->id)->where('is_paid', false)->first();
        $countries = Country::all();
        $counties = County::all();
        // Fetch ordered products
        $ordered_products = $order->productVariations()->with('product')->get();


        if ($order) {
            // Preluăm informațiile de facturare și livrare din profilul utilizatorului
            $order->company_information = is_string($user->company_information) 
                ? json_decode($user->company_information, true) 
                : $user->company_information;

            $order->delivery_information = is_string($user->delivery_information) 
                ? json_decode($user->delivery_information, true) 
                : $user->delivery_information;

            // Salvăm aceste date în comanda curentă
            $order->save();
        }

        return view('products.finalizeaza-comanda', compact('user', 'order', 'countries', 'counties', 'ordered_products', 'isGuest'));
    }


    public function processCheckout(Request $request)
    {
        // dd($request->all());
        // Validăm datele introduse de utilizator
        $request->validate([
            'billing_type' => 'required',
            'delivery_type' => 'required',
            'payment_method' => 'required',
            'company_information' => 'required|array',
            // 'delivery_information' => 'required|array',
        ]);

        // Preluăm utilizatorul și comanda curentă
        $user = auth()->user();
        $order = Order::where('user_id', $user->id)
                  ->where('id', $request->input('order_id'))
                  ->where('is_paid', false)
                  ->first();

        // dd($order);

        if ($order) {
            // Actualizăm datele comenzii cu informațiile primite din formular
            $order->update([
                'billing_type' => $request->input('billing_type'),
                'delivery_type' => $request->input('delivery_type'),
                'payment_method' => $request->input('payment_method'),
                'company_information' => json_encode($request->input('company_information')), 
                'delivery_information' => json_encode($request->input('delivery_information')), 
                'is_paid' => true,
                'contact_information' => json_encode($request->only('contact_name', 'contact_phone', 'contact_email')), 
            ]);

            // Redirect la pagina de mulțumire
            return redirect()->route('home');
        }

        // Dacă nu există o comandă, redirect la pagina coșului
        return redirect()->route('aplicare.aplicare-vopsele-lavabile');
    }
}
