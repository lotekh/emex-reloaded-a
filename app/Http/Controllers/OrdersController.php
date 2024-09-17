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

        if ($user) {
            $order = Order::where('user_id', $user->id)->where('is_paid', false)->first();
        } else {
            $order = Order::where('user_id', null)->where('is_paid', false)->first();
        }

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
        $userId = $user ? $user->id : null;
        $productVariation = ProductVariation::findOrFail($request->input('product_variation_id'));

        $order = Order::firstOrCreate(
            ['user_id' => $userId, 'is_paid' => false],
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

        return redirect()->back();
    }
    

        public function updateQuantity(Request $request)
    {
        $user = Auth::user();
        $userId = $user ? $user->id : null;
        $productVariation = ProductVariation::findOrFail($request->input('product_variation_id'));

        $order = Order::where('user_id', $userId)->where('is_paid', false)->first();

        if ($order) {
            $existingOrderProduct = $order->productVariations()->where('product_variation_id', $productVariation->id)->first();

            if ($existingOrderProduct) {
                // Actualizează cantitatea
                $newQuantity = $existingOrderProduct->pivot->quantity + $request->input('quantity', 1);
                if ($newQuantity <= 0) {
                    // Dacă noua cantitate este 0 sau mai mică, șterge produsul din coș
                    $order->productVariations()->detach($productVariation->id);
                } else {
                    // Altfel, actualizează cantitatea și prețul
                    $existingOrderProduct->pivot->quantity = $newQuantity;
                    $existingOrderProduct->pivot->price = $productVariation->price;
                    $existingOrderProduct->pivot->price_no_vat = $productVariation->price * 0.81;
                    $existingOrderProduct->pivot->save();
                }

                // Recalculează totalul comenzii
                $order->total = $order->productVariations->sum(function ($product) {
                    return $product->pivot->quantity * $product->pivot->price;
                });
                $order->save();
            }
        }

        return redirect()->back();
    }



    public function removeProduct(Request $request)
    {
        // dd('Method accessed');

        $user = Auth::user();
        if ($user) {
            $order = $user->orders()->where('is_paid', false)->first();
        } else {
            $order = Order::where('user_id', null)->where('is_paid', false)->first();
        }
        
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
        $countyId = $request->query('county_id');
        $orderId = $request->query('order_id');  
        $user = auth()->user();

        // Obține comanda activă fie pentru utilizatorul logat, fie pentru utilizatorul nelogat
        if ($user) {
            $order = Order::where('user_id', $user->id)->where('is_paid', false)->first();
        } else {
            $order = Order::where('user_id', null)->where('is_paid', false)->first();
        }

        if (!$order) {
            return response()->json(['error' => 'No active order found'], 404);
        }

        $totalQuantity = 0;

        foreach ($order->productVariations as $productVariation) {
            // Accesează cantitatea din `product_variations` prin relația definită
            $totalQuantity += $productVariation->quantity; // `quantity` din `product_variations`
        }

        // Define transport prices based on quantity and region
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

        // Determine the correct price based on county and quantity
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
        
        $order->update([
                'transport_price' => $formattedPrice,
                'transport_price_no_tva' => $formattedPrice - $formattedTva,
            ]);
        
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

        if ($user) {
            // Dacă utilizatorul este autentificat, căutăm comanda lui
            $order = Order::where('user_id', $user->id)->where('is_paid', false)->first();
        } else {
            // Dacă utilizatorul nu este autentificat, căutăm comanda fără user_id
            $order = Order::where('user_id', null)->where('is_paid', false)->first();
        }

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

        if ($user) {
            // Dacă utilizatorul este autentificat, căutăm comanda lui
            $order = Order::where('user_id', $user->id)->where('is_paid', false)->first();
        } else {
            // Dacă utilizatorul nu este autentificat, căutăm comanda fără user_id
            $order = Order::where('user_id', null)->where('is_paid', false)->first();
        }
        
        $countries = Country::all();
        $counties = County::all();
        // Fetch ordered products
        $ordered_products = $order->productVariations()->with('product')->get();


        if ($order && $user) {
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

    if ($user) {
        $order = Order::where('user_id', $user->id)
                    ->where('id', $request->input('order_id'))
                    ->where('is_paid', false)
                    ->first();
    } else {
        $order = Order::where('user_id', null)
                    ->where('id', $request->input('order_id'))
                    ->where('is_paid', false)
                    ->first();
    }

    if ($order) {
        // Inițializăm variabile pentru a stoca ID-ul județului și alte informații
        $personCountyId = null;
        $companyCountyId = null;
        $deliveryCountyId = null;

        // Setăm valorile pentru persoană fizică sau juridică în funcție de billing_type
        if ($request->input('billing_type') == 0) { // Persoană fizică
            $companyInformationArray = [
                'person_last_name' => $request->input('person_last_name'),
                'person_first_name' => $request->input('person_first_name'),
                'person_phone' => $request->input('person_phone'),
                'person_email' => $request->input('person_email'),
                'person_country_id' => $request->input('company_information.person_country_id'),
                'person_county_id' => $request->input('company_information.person_county_id'),
                'person_locality' => $request->input('company_information.person_locality'),
                'person_address' => $request->input('company_information.person_address'),
            ];
            $personCountyId = $companyInformationArray['person_county_id'];
        } elseif ($request->input('billing_type') == 1) { // Persoană juridică
            $companyInformationArray = [
                'organization_name' => $request->input('organization_name'),
                'organization_cui' => $request->input('organization_cui'),
                'organization_phone' => $request->input('organization_phone'),
                'organization_email' => $request->input('organization_email'),
                'organization_bank' => $request->input('organization_bank'),
                'organization_bank_account' => $request->input('organization_bank_account'),
                'contact_person_last_name' => $request->input('contact_person_last_name'),
                'contact_person_first_name' => $request->input('contact_person_first_name'),
                'organization_country_id' => $request->input('company_information.organization_country_id'),
                'organization_county_id' => $request->input('company_information.organization_county_id'),
                'organization_locality' => $request->input('company_information.organization_locality'),
                'organization_address' => $request->input('company_information.organization_address'),
            ];
            $companyCountyId = $companyInformationArray['organization_county_id'];
        }

        // Copierea datelor de facturare în datele de livrare, dacă opțiunea este bifată
        if ($request->input('delivery_data_same_as_billing')) {
            if ($request->input('billing_type') == 0) { // Persoană fizică
                $request->merge([
                    'delivery_last_name' => $request->input('person_last_name'),
                    'delivery_first_name' => $request->input('person_first_name'),
                    'delivery_phone' => $request->input('person_phone'),
                    'delivery_email' => $request->input('person_email'),
                    'delivery_country_id' => $request->input('company_information.person_country_id'),
                    'delivery_county_id' => $personCountyId,
                    'delivery_locality' => $request->input('company_information.person_locality'),
                    'delivery_address' => $request->input('company_information.person_address'),
                ]);
            } elseif ($request->input('billing_type') == 1) { // Persoană juridică
                $request->merge([
                    'delivery_last_name' => $request->input('contact_person_last_name'),
                    'delivery_first_name' => $request->input('contact_person_first_name'),
                    'delivery_phone' => $request->input('organization_phone'),
                    'delivery_email' => $request->input('organization_email'),
                    'delivery_country_id' => $request->input('company_information.organization_country_id'),
                    'delivery_county_id' => $companyCountyId,
                    'delivery_locality' => $request->input('company_information.organization_locality'),
                    'delivery_address' => $request->input('company_information.organization_address'),
                ]);
            }

            // Actualizează variabila deliveryCountyId cu cea corectă
            $deliveryCountyId = $request->input('delivery_county_id');
        } else {
            // Dacă nu sunt aceleași, folosește valoarea din inputurile de livrare
            if ($request->input('delivery_type') == 0) { // Curier
                $deliveryCountyId = $request->input('delivery_county_id');
            }
        }

        // Calculează costul de ramburs dacă tipul de livrare este curier
        $rambursValue = 0;
        $rambursTva = 0;
        if ($request->input('delivery_type') == 0 && $request->input('payment_method') == 'ramburs') {
            // valoarea de ramburs e 3 la suta din valoarea comenzii fara tva, adica 3 la suta din 100-19 = 81% din $order->total
            $rambursValue = (($order->total * 81) / 100) * 3 / 100;
            $rambursTva = ($rambursValue * 19) / 100;
            $order->total += $rambursValue + $rambursTva; // Adăugăm costul rambursului la total
        }

        $order->transport_price_no_tva = $order->transport_price;
        $order->transport_price = 1.19 * $order->transport_price_no_tva;
        $order->total = $order->total + $order->transport_price;
        $order->total_no_tva = $order->total * 0.81;

        // Pregătim contact_information ca JSON
        $contactInformation = null;
        if ($request->input('delivery_type') == 0) { // Livrare prin curier
            $contactInformation = json_encode([
                'email' => $request->input('delivery_email'),
                'phone' => $request->input('delivery_phone'),
            ]);
        }

        // Construim delivery_information dacă este cazul
        $deliveryInformation = null;
        if ($request->input('delivery_type') == 0) { // Livrare prin curier
            $deliveryInformationArray = [
                'delivery_last_name' => $request->input('delivery_last_name'),
                'delivery_first_name' => $request->input('delivery_first_name'),
                'delivery_phone' => $request->input('delivery_phone'),
                'delivery_email' => $request->input('delivery_email'),
                'delivery_country_id' => $request->input('delivery_country_id'),
                'delivery_county_id' => $request->input('delivery_county_id'),
                'delivery_locality' => $request->input('delivery_locality'),
                'delivery_address' => $request->input('delivery_address'),
            ];

            // Adăugăm costurile rambursului doar dacă metoda de plată este 'ramburs'
            if ($request->input('payment_method') == 'ramburs') {
                $deliveryInformationArray['ramburs_value'] = number_format($rambursValue, 2, '.', '');
                $deliveryInformationArray['ramburs_tva'] = number_format($rambursTva, 2, '.', '');
            }

            // Convertim în JSON
            $deliveryInformation = json_encode($deliveryInformationArray);
        }

        // Actualizăm datele comenzii cu informațiile primite din formular
        $order->update([
            'billing_type' => $request->input('billing_type'),
            'delivery_type' => $request->input('delivery_type'),
            'payment_method' => $request->input('payment_method'),
            'person_county_id' => $personCountyId,
            'company_county_id' => $companyCountyId,
            'delivery_county_id' => $deliveryCountyId,
            'company_information' => json_encode($companyInformationArray),  
            'is_paid' => true,
            'delivery_information' => $deliveryInformation,
            'contact_information' => $contactInformation, 
        ]);

        // Redirecționăm utilizatorul la pagina de sumar comandă după ce comanda este procesată
        return redirect()->route('order.summary', ['guid' => $order->guid]);
    }

    return redirect()->route('aplicare.vopsele.lavabile');
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