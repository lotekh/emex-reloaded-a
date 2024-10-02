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
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use App\Models\Media;

class OrdersController extends Controller
{
    public function index()
    {
        // Preluăm produsele din sesiune
        $cart = session()->get('cart', []);
        
        if (!empty($cart)) {
            $productVariationIds = array_column($cart, 'product_variation_id');
            $ordered_products = ProductVariation::whereIn('id', $productVariationIds)->with('product')->get();
        } else {
            $ordered_products = [];
        }

        // Preluăm detaliile produselor din baza de date folosind ID-urile din sesiune
        if (!empty($cart)) {
            $productVariationIds = array_keys($cart);
            $ordered_products = ProductVariation::whereIn('id', $productVariationIds)->with('product')->get();
        }

        return view('products.ordered-products', compact('ordered_products', 'cart'));
    }



    public function addProduct(Request $request)
    {
        $productVariationId = $request->input('product_variation_id');
        $quantity = $request->input('quantity', 1);

        // Preluăm lista de produse din sesiune
        $cart = session()->get('cart', []);

        // Verificăm dacă produsul există deja în sesiune și actualizăm cantitatea
        if (isset($cart[$productVariationId])) {
            $cart[$productVariationId]['quantity'] += $quantity;
        } else {
            $productVariation = ProductVariation::findOrFail($productVariationId);
            $cart[$productVariationId] = [
                'quantity' => $quantity,
                'price' => $productVariation->price,
                'price_no_vat' => $productVariation->price * 0.81, // Calculăm fără TVA
                'product_variation_id' => $productVariationId,
            ];
        }

        // Salvăm lista de produse actualizată în sesiune
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produsul a fost adăugat în coș.');
    }

    

    public function updateQuantity(Request $request)
    {
        $productVariationId = $request->input('product_variation_id');
        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if (isset($cart[$productVariationId])) {
            $cart[$productVariationId]['quantity'] = max(1, $quantity); 
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Cantitatea a fost actualizată.');
    }


    public function removeProduct(Request $request)
    {
        $productVariationId = $request->input('product_variation_id');
        $cart = session()->get('cart', []);

        if (isset($cart[$productVariationId])) {
            unset($cart[$productVariationId]);
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produsul a fost eliminat din coș.');
    }

    
    public function getTransportPrice(Request $request)
    {
        $countyId = $request->query('county_id');
        
        // Verificăm dacă există produse în sesiune
        $cartProducts = session()->get('cart_list_products', []);

        if (empty($cartProducts)) {
            return response()->json(['error' => 'Nu există produse în coș.'], 404);
        }

        $totalQuantity = 0;

        // Calculăm cantitatea totală a produselor din sesiune
        foreach ($cartProducts as $product) {
            // Adaugăm la cantitatea totală
            $totalQuantity += $product['quantity'];
        }

        // Definim prețurile de transport pe baza cantității și regiunii
        $transportPricesBucurestiIlfov = [
            ['min' => 0, 'max' => 50, 'price' => 25],
            ['min' => 51, 'max' => 100, 'price' => 75],
            ['min' => 101, 'max' => 250, 'price' => 100],
        ];

        $transportPricesInTara = [
            ['min' => 1, 'max' => 10, 'price' => 25],
            ['min' => 11, 'max' => 50, 'price' => 45],
            ['min' => 51, 'max' => 100, 'price' => 75],
            ['min' => 101, 'max' => 200, 'price' => 150],
            ['min' => 201, 'max' => 250, 'price' => 175],
        ];

        // Determinăm prețul corect pe baza județului și cantității
        $price = 0;

        if (in_array($countyId, [1160, 1176])) { // Bucuresti + Ilfov
            foreach ($transportPricesBucurestiIlfov as $range) {
                if ($totalQuantity >= $range['min'] && $totalQuantity <= $range['max']) {
                    $price = $range['price'];
                    break;
                }
            }
        } else { // Restul tarii
            foreach ($transportPricesInTara as $range) {
                if ($totalQuantity >= $range['min'] && $totalQuantity <= $range['max']) {
                    $price = $range['price'];
                    break;
                }
            }
        }

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
        // Golește coșul de cumpărături din sesiune
        session()->forget('cart');

        return redirect()->route('orders.index')->with('success', 'Coșul de cumpărături a fost golit.');
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
    
        // Obținem produsele din sesiune
        $cart = session()->get('cart', []);
    
        // Dacă nu există produse în coș, redirecționăm utilizatorul la pagina coșului
        if (empty($cart)) {
            return redirect()->route('orders.index')->with('error', 'Coșul de cumpărături este gol.');
        }
    
        // Preluăm detaliile produselor din baza de date
        $productVariationIds = array_keys($cart);
        $ordered_products = ProductVariation::whereIn('id', $productVariationIds)->with('product')->get();
    
        // Dacă utilizatorul este autentificat, preluăm informațiile de facturare și livrare din profilul utilizatorului
        if ($user) {
            $company_information = is_string($user->company_information) ? json_decode($user->company_information, true) : $user->company_information;
            $delivery_information = is_string($user->delivery_information) ? json_decode($user->delivery_information, true) : $user->delivery_information;
        } else {
            $company_information = null;
            $delivery_information = null;
        }
    
        // Preluăm listele de țări și județe pentru dropdown-uri
        $countries = Country::all();
        $counties = County::all();
    
        return view('products.finalizeaza-comanda', compact('user', 'cart', 'ordered_products', 'countries', 'counties', 'isGuest', 'company_information', 'delivery_information'));
    }
    

    public function processCheckout(Request $request)
    {
        $request->validate([
            'billing_type' => 'required',
            'delivery_type' => 'required',
            'payment_method' => 'required',
            'company_information' => 'required|array',
        ]);

        // Preluăm utilizatorul și coșul din sesiune
        $user = auth()->user();
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('orders.index')->with('error', 'Nu există produse în coș.');
        }

        // Creăm comanda în baza de date
        $order = new Order();
        if ($user) {
            $order->user_id = $user->id;
        }
        $order->billing_type = $request->input('billing_type');
        $order->delivery_type = $request->input('delivery_type');
        $order->payment_method = $request->input('payment_method');
        $order->total = 0; // Vom calcula totalul mai jos
        $order->save();

        // Mutăm produsele din sesiune în baza de date
        foreach ($cart as $productVariationId => $details) {
            $order->productVariations()->attach($productVariationId, [
                'quantity' => $details['quantity'],
                'price' => $details['price'],
                'price_no_vat' => $details['price_no_vat'],
            ]);

            // Actualizăm totalul comenzii
            $order->total += $details['quantity'] * $details['price'];
        }

        // Salvăm totalul comenzii
        $order->save();

        // Golește coșul din sesiune
        session()->forget('cart');

        return redirect()->route('thank-you')->with('success', 'Comanda a fost plasată cu succes.');
    }


    


    public function showSummary(Request $request)
    {
        // Preia `guid` din query parameters
        $guid = $request->query('guid');

        // Găsește comanda pe baza `guid`
        $order = Order::where('guid', $guid)->first();

        // Verifică dacă comanda există și dacă utilizatorul este autentificat
        if (!$order) {
            return redirect()->route('home')->with('error', 'Comanda nu a fost găsită.');
        }

        // Verifică dacă utilizatorul are permisiunea de a vedea comanda
        // if ($order->user_id !== null && (!$user || $user->id !== $order->user_id)) {
        //     abort(403, 'Acces interzis.');
        // }

        $orders_products = $order->productVariations()->withPivot('quantity', 'price', 'price_no_vat')->get();

        $county = 0;
        $countyName = 0;
        $city = 0;

        if ($order->delivery_type == 0) {  //livrare prin curier
            // $county = $order->deliveryCounty->name ;
            $county = County::where('id', $order->delivery_county_id)->first();
            $countyName = $county ? $county->name : 'Necunoscut';
            $city = $order->delivery_information['delivery_locality'] ?? ''; // Ia localitatea din informațiile de livrare
        }

        $billingCountyId = null;
        $billingCountyName = 'Necunoscut';

        // Obține ID-ul județului în funcție de billing_type
        if ($order->billing_type == 0) {  // Persoană fizică
            $billingCountyId = json_decode($order->company_information, true)['person_county_id'] ?? null;
        } elseif ($order->billing_type == 1) {  // Persoană juridică
            $billingCountyId = json_decode($order->company_information, true)['organization_county_id'] ?? null;
        }

        // Dacă avem un ID de județ, obținem numele județului
        if ($billingCountyId) {
            $billingCounty = County::where('id', $billingCountyId)->first();
            $billingCountyName = $billingCounty ? $billingCounty->name : 'Necunoscut';
        }


        // Generează valoarea de conversie (conversion value)
        $conversion_value = 0;
        foreach ($orders_products as $product) {
            if ($product->name !== 'Transport' && $product->name !== 'Cost Ramburs') {
                $conversion_value += $product->pivot->price_no_tva * $product->pivot->quantity;
            }
        }

        $conversion_value = number_format(round($conversion_value, 2), 2, '.', ',');

        // Verifică dacă linkul este valid (poți modifica această logică în funcție de nevoile tale)
        $valid_link = 1;

        // Returnează pagina de sumar comandă
        return view('products.summary', compact('order', 'orders_products','billingCountyName', 'county', 'countyName', 'city', 'valid_link', 'conversion_value'));
    }


}