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
use Illuminate\Support\Str;


class OrdersController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        
        $ordered_products = [];

        // Dacă există produse în sesiune, preia detaliile despre produse
        if (!empty($cart)) {
            $productVariationIds = array_column($cart, 'product_variation_id');
            
            // Preia produsele corespunzătoare din baza de date
            $ordered_products = ProductVariation::whereIn('id', $productVariationIds)->with('product')->get();
            
            foreach ($ordered_products as $product) {
                foreach ($cart as $cartItem) {
                    if ($cartItem['product_variation_id'] == $product->id) {
                        // ordered_quantity is the quantity from session(how many products were ordered)
                        $product->ordered_quantity = $cartItem['quantity']; 
                        $product->price = $cartItem['price'];  
                        $product->price_no_vat = $cartItem['price_no_vat']; 
                    }
                }
            }
        }

        return view('products.ordered-products', compact('ordered_products'));
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
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return response()->json(['error' => 'Nu există produse în coș.'], 404);
        }

        $productVariationIds = array_column($cart, 'product_variation_id');
        // $ordered_products = ProductVariation::whereIn('id', $productVariationIds)->get();
        $ordered_products = ProductVariation::whereIn('id', $productVariationIds)->with('product')->get();

        $totalQuantity = 0;

        // Calculăm cantitatea totală a produselor din sesiune
        foreach ($ordered_products as $product) {
            foreach ($cart as $cartItem) {
                if ($cartItem['product_variation_id'] == $product->id) {
                    $totalQuantity += $cartItem['quantity'] * $product->quantity;
                }
            }
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

        $order = session()->get('order', []);
        $order['transport_price'] = $formattedPrice;
        $order['transport_price_no_tva'] = number_format($formattedPrice - $formattedTva, 2, '.', '');
        session()->put('order', $order);


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
        $isGuest = auth()->guest();

        $cart = session()->get('cart', []);
        $ordered_products = [];

        if (empty($cart)) {
            return redirect()->route('orders.index')->with('error', 'Coșul de cumpărături este gol.');
        }

        if (!empty($cart)) {
            $productVariationIds = array_column($cart, 'product_variation_id');
            $ordered_products = ProductVariation::whereIn('id', $productVariationIds)->with('product')->get();
        
            foreach ($ordered_products as $product) {
                foreach ($cart as $cartItem) {
                    if ($cartItem['product_variation_id'] == $product->id) {
                        $product->ordered_quantity = $cartItem['quantity'];
                        $product->price = $cartItem['price'];
                        $product->price_no_vat = $cartItem['price_no_vat'];
                    }
                }
            }
        }

        // Verificăm dacă există deja un 'order_id' în sesiune
        $order_id = session()->get('order_id', null);
        
        // Dacă nu există, generăm unul nou și îl salvăm în sesiune
        if (!$order_id) {
            $order_id = Str::uuid(); // Poți folosi un UUID sau alt mecanism pentru generare
            session()->put('order_id', $order_id);
        }

        // Inițializăm sau preluăm datele din sesiune pentru comanda curentă
        $order = session()->get('order', [
            'guid' => \Illuminate\Support\Str::uuid(),
            'identifier' => strtoupper(\Illuminate\Support\Str::random(10)),
            'total' => array_sum(array_map(function ($item) {
                return $item['quantity'] * $item['price'];
            }, $cart)),
            'billing_type' => null,
            'delivery_type' => null,
            'payment_method' => null,
            'company_information' => $user ? $user->company_information : null,
            'delivery_information' => $user ? $user->delivery_information : null
        ]);

        // Actualizăm datele de facturare și livrare dacă utilizatorul este autentificat
        if ($user) {
            $order['company_information'] = is_string($user->company_information)
                ? json_decode($user->company_information, true)
                : $user->company_information;

            $order['delivery_information'] = is_string($user->delivery_information)
                ? json_decode($user->delivery_information, true)
                : $user->delivery_information;
        }

        // Salvăm comanda în sesiune
        session()->put('order', $order);

        // Preluăm listele de țări și județe
        $countries = Country::all();
        $counties = County::all();

        return view('products.finalizeaza-comanda', compact('user', 'order', 'countries', 'counties', 'ordered_products', 'isGuest', 'order_id'));
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
        $userId = $user ? $user->id : null;
        $cart = session()->get('cart', []);
        $order = session()->get('order', null);
    
        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Comanda nu a fost găsită.');
        }
    
        // Creăm comanda în baza de date doar dacă nu există deja
        // $dbOrder = Order::where('guid', $order['guid'])->first();
        // if (!$dbOrder) {
        //     $dbOrder = new Order();
        //     $dbOrder->guid = $order['guid'];
        //     $dbOrder->identifier = $order['identifier'];
        // }


        $dbOrder = Order::firstOrCreate(
            ['guid' => $order['guid']],
            [
                'user_id' => $userId,
                'identifier' => $order['identifier'],
                'billing_type' => $request->input('billing_type'),
                'delivery_type' => $request->input('delivery_type'),
                'payment_method' => $request->input('payment_method'),
                'total' => 0, 
                'is_paid' => false
            ]
        );

        // $dbOrder->billing_type = $request->input('billing_type');
        // $dbOrder->delivery_type = $request->input('delivery_type');
        // $dbOrder->payment_method = $request->input('payment_method');

        $total = 0;
        foreach ($cart as $cartItem) {
            $dbOrder->productVariations()->attach($cartItem['product_variation_id'], [
                'quantity' => $cartItem['quantity'],
                'price' => $cartItem['price'],
                'price_no_vat' => $cartItem['price_no_vat'],
            ]);

            // Calculăm totalul
            $total += $cartItem['quantity'] * $cartItem['price'];
        }
        $dbOrder->total = $total;
        $dbOrder->is_paid = false;


        if ($dbOrder) {
            // Preluăm transport_price și transport_price_no_tva din sesiune
            if (isset($order['transport_price']) && isset($order['transport_price_no_tva'])) {
                $dbOrder->transport_price = $order['transport_price'];
                $dbOrder->transport_price_no_tva = $order['transport_price_no_tva'];
            }

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

           

            // Calculează costul de ramburs dacă tipul de livrare este curier
            $rambursValue = 0;
            $rambursTva = 0;
            if ($request->input('delivery_type') == 0 && $request->input('payment_method') == 'ramburs') {
                // valoarea de ramburs e 3 la suta din valoarea comenzii fara tva, adica 3 la suta din 100-19 = 81% din $dbOrder->total
                $rambursValue = (($dbOrder->total * 81) / 100) * 3 / 100;
                $rambursTva = ($rambursValue * 19) / 100;
                $dbOrder->total += $rambursValue + $rambursTva; // Adăugăm costul rambursului la total
            }

            $dbOrder->transport_price_no_tva = $dbOrder->transport_price;
            $dbOrder->transport_price = 1.19 * $dbOrder->transport_price_no_tva;
            $dbOrder->total = $dbOrder->total + $dbOrder->transport_price;
            $dbOrder->total_no_tva = $dbOrder->total * 0.81;

            $deliveryInformation = null;
            $deliveryInformationArray = null;
            // Copierea datelor de facturare în datele de livrare, dacă opțiunea este bifată
            if ($request->input('delivery_data_same_as_billing')) {
                if ($request->input('billing_type') == 0) { // Persoană fizică
                    $deliveryInformationArray = [
                        'delivery_last_name' => $request->input('person_last_name'),
                        'delivery_first_name' => $request->input('person_first_name'),
                        'delivery_phone' => $request->input('person_phone'),
                        'delivery_email' => $request->input('person_email'),
                        'delivery_country_id' => $request->input('company_information.person_country_id'),
                        'delivery_county_id' => $personCountyId,
                        'delivery_locality' => $request->input('company_information.person_locality'),
                        'delivery_address' => $request->input('company_information.person_address'),
                    ];
                } elseif ($request->input('billing_type') == 1) { // Persoană juridică
                    $deliveryInformationArray = [
                        'delivery_last_name' => $request->input('contact_person_last_name'),
                        'delivery_first_name' => $request->input('contact_person_first_name'),
                        'delivery_phone' => $request->input('organization_phone'),
                        'delivery_email' => $request->input('organization_email'),
                        'delivery_country_id' => $request->input('company_information.organization_country_id'),
                        'delivery_county_id' => $companyCountyId,
                        'delivery_locality' => $request->input('company_information.organization_locality'),
                        'delivery_address' => $request->input('company_information.organization_address'),
                    ];
                }
            } else {
                // Dacă datele de livrare nu sunt aceleași cu cele de facturare, folosește valoarea din inputurile de livrare
                if ($request->input('delivery_type') == 0) { // Curier
                    $deliveryInformationArray = [
                        'delivery_last_name' => $request->input('delivery_last_name'),
                        'delivery_first_name' => $request->input('delivery_first_name'),
                        'delivery_phone' => $request->input('delivery_phone'),
                        'delivery_email' => $request->input('delivery_email'),
                        'delivery_country_id' => $request->input('delivery_information.delivery_country_id'),
                        'delivery_county_id' => $request->input('delivery_information.delivery_county_id'),
                        'delivery_locality' => $request->input('delivery_locality'),
                        'delivery_address' => $request->input('delivery_address'),
                    ];
                }
            }

            if ($deliveryInformationArray){
                $deliveryCountyId = $deliveryInformationArray['delivery_county_id'];
            }

            if ($request->input('delivery_type') == 0) { // Livrare prin curier
                
                // Adăugăm costurile rambursului doar dacă metoda de plată este 'ramburs'
                if ($request->input('payment_method') == 'ramburs') {
                    $deliveryInformationArray['ramburs_value'] = number_format($rambursValue, 2, '.', '');
                    $deliveryInformationArray['ramburs_tva'] = number_format($rambursTva, 2, '.', '');
                }

                // Convertim în JSON
                $deliveryInformation = json_encode($deliveryInformationArray);
            }

            // Pregătim contact_information ca JSON
            $contactInformation = null;
            if ($request->input('delivery_type') == 0) { // Livrare prin curier
                $contactInformation = json_encode([
                    'email' => $deliveryInformationArray['delivery_email'],
                    'phone' => $deliveryInformationArray['delivery_phone'],
                ]);
            }

            // Actualizăm datele comenzii cu informațiile primite din formular
            $dbOrder->update([
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

            // Obținem produsele din comandă și alte informații necesare
            $orders_products = $dbOrder->productVariations()->withPivot('quantity', 'price', 'price_no_vat')->get();
            $billingCountyId = null;
            $billingCountyName = 'Necunoscut';

            // Obține ID-ul județului în funcție de billing_type
            if ($dbOrder->billing_type == 0) {  // Persoană fizică
                $billingCountyId = json_decode($dbOrder->company_information, true)['person_county_id'] ?? null;
            } elseif ($dbOrder->billing_type == 1) {  // Persoană juridică
                $billingCountyId = json_decode($dbOrder->company_information, true)['organization_county_id'] ?? null;
            }

            // Dacă avem un ID de județ, obținem numele județului
            if ($billingCountyId) {
                $billingCounty = County::where('id', $billingCountyId)->first();
                $billingCountyName = $billingCounty ? $billingCounty->name : 'Necunoscut';
            }


            // Generăm PDF-ul proformei
            $pdf = PDF::loadView('products.invoice2', [
                'order' => $dbOrder,
                'orders_products' => $orders_products,
                'billingCountyName' => $billingCountyName
            ]);

            try {
                // Obținem id-ul maxim din tabela media
                $maxId = Media::max('id');
                $newId = $maxId + 1;

                // Numele fișierului PDF și calea unde va fi salvat
                $fileName = 'proforma_RTCH-N-' . $dbOrder->identifier . '.pdf';
                $filePath = 'media/' . $newId . '/' . $fileName;

                // Salvăm PDF-ul în sistemul de fișiere (public/media/newId/)
                Storage::disk('public')->put($filePath, $pdf->output());

                // Salvăm informațiile fișierului în tabela media
                $media = Media::create([
                    'disk' => 'public',
                    'directory' => 'media/' . $newId,
                    'visibility' => 'public',
                    'name' => $fileName,
                    'path' => 'media/' . $newId . '/' . $fileName,
                    'type' => 'application/pdf',
                    'ext' => 'pdf',
                ]);

                // Asociem fișierul PDF cu comanda
                $dbOrder->proforma_id = $media->id;
                $dbOrder->save();
                session()->forget('cart');
                session()->forget('order');
            }
            catch (\Exception $e) {
                echo $e->getMessage();
            }

            // Redirecționăm utilizatorul la pagina de sumar comandă după ce comanda este procesată
            return redirect()->route('order.summary', ['guid' => $dbOrder->guid])->with('success', 'Comanda a fost plasată cu succes.');
        }

        // Golește coșul din sesiune
        session()->forget('cart');
        session()->forget('order');

        return redirect()->route('/');
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