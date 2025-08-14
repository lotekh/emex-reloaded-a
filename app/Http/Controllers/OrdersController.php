<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
// use Illuminate\Http\Response;
use App\Models\City;
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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\OrdersProductVariation;
use App\Helpers\TvaHelper;
use App\Models\DiscountCode;

class OrdersController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        
        $ordered_products = [];

        // If there are alredy products in the session, get the product details
        if (!empty($cart)) {
            $productVariationIds = array_column($cart, 'product_variation_id');
            
            // Get the information from the database
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

        // Get the cart from session
        $cart = session()->get('cart', []);

        // Verify if the product is already in session and update the quantity
        if (isset($cart[$productVariationId])) {
            $cart[$productVariationId]['quantity'] += $quantity;
        } else {
            $productVariation = ProductVariation::findOrFail($productVariationId);
            $cart[$productVariationId] = [
                'quantity' => $quantity,
                'price' => $productVariation->price,
                'price_no_vat' => round($productVariation->price * 100 / TvaHelper::getPriceWithTvaRate(), 2),
                'product_variation_id' => $productVariationId,
            ];
        }

        // Save the updated cart in session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produsul a fost adăugat în coș.');
    }

    

    public function updateQuantity(Request $request)
    {
        $productVariationId = $request->input('product_variation_id');
        $quantity = $request->input('quantity', 1);  

        // Get the cart from session
        $cart = session()->get('cart', []);

        // If that product is in cart
        if (isset($cart[$productVariationId])) {
            $cart[$productVariationId]['quantity'] = max(1, $quantity);
        }

        // Save the updated cart in session 
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Cantitatea a fost actualizată.');
    }


    public function removeProduct(Request $request)
    {
        $productVariationId = $request->input('product_variation_id');
        $cart = session()->get('cart', []);

        $quantity = $cart[$productVariationId]['quantity'] ?? 0;

        if (isset($cart[$productVariationId])) {
            unset($cart[$productVariationId]);
        }

        session()->put('cart', $cart);

        $productVariation = ProductVariation::find($productVariationId);
        if($productVariation) {
            return redirect()->back()->with('success', 'Produsul a fost eliminat din coș.')
            ->with('product', [
                'quantity' => $quantity,
                'price' => $productVariation->price,
                'sku' => $productVariation->sku,
                'name' => $productVariation->name,
            ]);
        } else {
            return redirect()->back()->with('success', 'Produsul a fost eliminat din coș.');
        }
    }

    
    public function getTransportPrice(Request $request)
    {
        $countyId = $request->query('county_id');
        
        // Verify if there are already products in the session
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return response()->json(['error' => 'Nu există produse în coș.'], 404);
        }

        $productVariationIds = array_column($cart, 'product_variation_id');
        $ordered_products = ProductVariation::whereIn('id', $productVariationIds)->with('product')->get();

        $totalQuantity = 0;

        // Calculate the total quantity of products in the session
        foreach ($ordered_products as $product) {
            foreach ($cart as $cartItem) {
                if ($cartItem['product_variation_id'] == $product->id) {
                    $totalQuantity += $cartItem['quantity'] * $product->quantity;
                }
            }
        }

        // Set the transport prices based on quantity and region
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

        // Get the right price based on county and quantity
        $county = County::find($countyId);
        $price = 0;
        // București or Ilfov
        if ($county && in_array($county->code, ['B', 'IF'])) { 
            foreach ($transportPricesBucurestiIlfov as $range) {
                if ($totalQuantity >= $range['min'] && $totalQuantity <= $range['max']) {
                    $price = $range['price'];
                    break;
                }
            }
        // Other counties
        } else { 
            foreach ($transportPricesInTara as $range) {
                if ($totalQuantity >= $range['min'] && $totalQuantity <= $range['max']) {
                    $price = $range['price'];
                    break;
                }
            }
        }

        // Calculate TVA
        $tva = $price * TvaHelper::getTvaMultiplier();

        // Format the price and TVA to have 2 decimals
        $formattedPrice = number_format($price, 2, '.', '');
        $formattedTva = number_format($tva, 2, '.', '');

        $order = session()->get('order', []);
        $order['transport_price'] = $formattedPrice;
        $order['transport_price_no_tva'] = number_format($formattedPrice - $formattedTva, 2, '.', '');
        session()->put('order', $order);


        // Return an array with the calculated values
        return response()->json([
            'price' => $formattedPrice,
            'tva' => $formattedTva,
            'total' => number_format($price + $tva, 2, '.', '')
        ]);
    }

    public function emptyCart()
    {
        // Empty the cart from the session
        session()->forget('cart');

        return redirect()->route('orders.index')->with('success', 'Coșul de cumpărături a fost golit.');
    }

    public function getCartProductVariationCount()
    {
        $cart = session()->get('cart', []);
        $productVariationCount = count($cart);
        return $productVariationCount;
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

        // Initialize or get the data from the session for our current order 
        $order = session()->get('order', [
            'total' => array_sum(array_map(function ($item) {
                return $item['quantity'] * $item['price'];
            }, $cart)),
            'billing_type' => null,
            'delivery_type' => null,
            'payment_method' => null,
            'company_information' => $user ? $user->company_information : null,
            'delivery_information' => $user ? $user->delivery_information : null
        ]);

        // Update company_information and delivery_information if the user is logged in
        if ($user) {
            $order['company_information'] = is_string($user->company_information)
                ? json_decode($user->company_information, true)
                : $user->company_information;

            $order['delivery_information'] = is_string($user->delivery_information)
                ? json_decode($user->delivery_information, true)
                : $user->delivery_information;
        }

        // Save the order in session
        session()->put('order', $order);

        // Get the list of counties and cities in alphabetical order
        $counties = County::orderBy('name', 'asc')->get();
        $cities = City::orderBy('name', 'asc')->get();

        // return view('products.finalizeaza-comanda', compact('user', 'order', 'cities', 'counties', 'ordered_products', 'isGuest'));
        return view('products.finalizeaza-comanda', [
            'user' => $user,
            'order' => $order,
            'cities' => $cities,
            'counties' => $counties,
            'ordered_products' => $ordered_products,
            'isGuest' => $isGuest,
            'tvaRate' => TvaHelper::getTvaRate(),
            'tvaMultiplier' => TvaHelper::getTvaMultiplier(),
            'tvaPriceMultiplier' => TvaHelper::getPriceWithTvaMultiplier(),
        ]);

    }

    public function applyDiscountCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        $codeInput = trim($request->input('code'));
        $discount = DiscountCode::where('code', $codeInput)->where('is_active', true)->first();

        if (!$discount) {
            return redirect()->back()->with('error', 'Codul introdus nu este valid sau nu mai este activ.');
        }

        $sessionDiscounts = session()->get('discounts', []);

        $isBulk = $discount->products()->count() === 0;

        // If it's a bulk discount code
        if ($isBulk) {
            if (!empty($sessionDiscounts)) {
                return redirect()->back()->with('error', 'Aplicarea acestui cod va elimina toate codurile de reducere. Elimina-le mai întâi dacă vrei să continui.');
            }

            session(['discounts' => [
                'bulk' => [
                    'code' => $discount->code,
                    'percentage' => $discount->percentage,
                    'product_id' => null,
                ]
            ]]);

            return redirect()->back()->with('success', 'Codul de reducere pentru toate produsele a fost aplicat cu succes.');
        }

        // If it's not a bulk discount(product discount code)
        if (isset($sessionDiscounts['bulk'])) {
            return redirect()->back()->with('error', 'Ai deja un cod de reducere general activ. Codurile pe produse nu pot fi combinate cu cele generale.');
        }

        // Product Discount -> Apply the discount code for every product 
        $appliedProducts = [];
        foreach ($discount->products as $product) {
            if (isset($sessionDiscounts[$product->id])) {
                return redirect()->back()->with('error', "Ai deja un cod de reducere aplicat pentru produsul: {$product->name}.");
            }

            $sessionDiscounts[$product->id] = [
                'code' => $discount->code,
                'percentage' => $discount->percentage,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_slug' => $product->slug,
            ];

            $appliedProducts[] = $product->name;
        }

        session(['discounts' => $sessionDiscounts]);

        return redirect()->back()->with('success', 'Codul de reducere a fost aplicat cu succes.');
    }


    public function removeDiscountCode($code)
    {
        $discounts = session()->get('discounts', []);

        // Remove the discount code from the session
        $discounts = array_filter($discounts, fn($discount) => $discount['code'] !== $code);

        session(['discounts' => $discounts]);

        return redirect()->back()->with('success', 'Codul de reducere a fost eliminat.');
    }




    public function processCheckout(Request $request)
    {
        $request->validate([
            'billing_type' => 'required',
            'delivery_type' => 'required',
            'payment_method' => 'required',
            'company_information' => 'required|array',
        ]);

        $user = auth()->user();
        $userId = $user ? $user->id : null;
        // Get the cart and order from session
        $cart = session()->get('cart', []);
        $order = session()->get('order', null);
    
        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Comanda nu a fost găsită.');
        }

        // If the guest has opted to create account, then create the account and log him in
        if ($request->input('create_account')) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $billingTypeUser = $request->input('billing_type');
            if ($billingTypeUser == 1) {
                // Persoană juridică
                $firstNameUser = $request->input('organization_name');
                $lastNameUser = null;
            } else {
                // Persoană fizică
                $firstNameUser = $request->input('person_first_name');
                $lastNameUser = $request->input('person_last_name');
            }
            
            $user = User::create([
                'first_name' => $firstNameUser,
                'last_name' => $lastNameUser,
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'billing_type' => $billingTypeUser,
            ]);

            Auth::login($user);
            Session::flash('success', 'Contul a fost creat și utilizatorul a fost autentificat cu succes!');
        }

        $lastOrder = Order::orderBy('id', 'desc')->first();
        if($lastOrder) {
            $identifier = $lastOrder->identifier + 1;
        }
        else {
            $identifier = 0;
        }

        do {
            $order_guid = Str::uuid()->toString();
        } while (Order::where('guid', $order_guid)->exists());

        $dbOrder = Order::firstOrCreate(
            ['guid' => $order_guid],
            [
                'user_id' => $userId,
                'identifier' => $identifier,
                'billing_type' => $request->input('billing_type'),
                'delivery_type' => $request->input('delivery_type'),
                'payment_method' => $request->input('payment_method'),
                'total' => 0, 
                'is_paid' => false
            ]
        );

        $total = 0;
        $discounts = session()->get('discounts', []);
        $hasBulkDiscount = isset($discounts['bulk']);
        $bulkDiscountPercentage = $hasBulkDiscount ? $discounts['bulk']['percentage'] : null;

        $productVariationIds = array_column($cart, 'product_variation_id');
        $productVariations = ProductVariation::with('product')->whereIn('id', $productVariationIds)->get();

        // Create map for product_variation_id => product_id
        $variationToProductMap = [];
        foreach ($productVariations as $variation) {
            $variationToProductMap[$variation->id] = $variation->product_id;
        }

        foreach ($cart as $cartItem) {
            $originalPrice = $cartItem['price'];
            $originalPriceNoVat = $cartItem['price_no_vat'];
            $discountedPrice = $originalPrice;
            $discountedPriceNoVat = $originalPriceNoVat;

            // Get product_id from the map
            $productId = $variationToProductMap[$cartItem['product_variation_id']] ?? null;

            if ($hasBulkDiscount) {
                $discountedPrice = round($originalPrice * (1 - $bulkDiscountPercentage / 100), 2);
                $discountedPriceNoVat = round($originalPriceNoVat * (1 - $bulkDiscountPercentage / 100), 2);
            } elseif ($productId !== null && array_key_exists($productId, $discounts)) {
                $productDiscount = $discounts[$productId];
                $discountedPrice = round($originalPrice * (1 - $productDiscount['percentage'] / 100), 2);
                $discountedPriceNoVat = round($originalPriceNoVat * (1 - $productDiscount['percentage'] / 100), 2);
            }

            $dbOrder->productVariations()->attach($cartItem['product_variation_id'], [
                'quantity' => $cartItem['quantity'],
                'price' => $discountedPrice,
                'price_no_vat' => $discountedPriceNoVat,
                'mentions' => $cartItem['mentions'] ?? null,
            ]);

            $total += $cartItem['quantity'] * $discountedPrice;
        }

        // Save discounts in db - only once per code
        $discountIds = [];
        foreach ($discounts as $discount) {
            if (isset($discount['code'])) {
                $discountModel = DiscountCode::where('code', $discount['code'])->first();
                if ($discountModel) {
                    $discountIds[] = $discountModel->id;
                }
            }
        }
        $discountIds = array_unique($discountIds);
        $dbOrder->discountCodes()->syncWithoutDetaching($discountIds);


        $dbOrder->total = $total;
        $dbOrder->is_paid = false;


        if ($dbOrder) {
            // Get transport_price and transport_price_no_tva from session
            if ($request->input('delivery_type') == 0 && isset($order['transport_price']) && isset($order['transport_price_no_tva'])) {
                // If delivery_type is 0(curier), add transport
                $dbOrder->transport_price = $order['transport_price'];
                $dbOrder->transport_price_no_tva = $order['transport_price_no_tva'];
            } else {
                // Else, if delivery_type is 1(ridicare personala), transport is 0
                $dbOrder->transport_price = 0;
                $dbOrder->transport_price_no_tva = 0;
            }

            $personCityId = null;
            $companyCityId = null;
            $deliveryCityId = null;

            // Set the values for persoana fizica or persoana juridica based on billing_type
            // Persoană fizică
            if ($request->input('billing_type') == 0) { 
                $companyInformationArray = [
                    'person_last_name' => $request->input('person_last_name'),
                    'person_first_name' => $request->input('person_first_name'),
                    'person_phone' => $request->input('person_phone'),
                    'person_email' => $request->input('person_email'),
                    'person_county_id' => $request->input('company_information.person_county_id'),
                    'person_city_id' => $request->input('company_information.person_city_id'),
                    'person_address' => $request->input('company_information.person_address'),
                ];
                $personCityId = $companyInformationArray['person_city_id'];
            // Persoană juridică
            } elseif ($request->input('billing_type') == 1) { 
                $companyInformationArray = [
                    'organization_name' => $request->input('organization_name'),
                    'organization_cui' => $request->input('organization_cui'),
                    'organization_phone' => $request->input('organization_phone'),
                    'organization_email' => $request->input('organization_email'),
                    'organization_bank' => $request->input('organization_bank'),
                    'organization_bank_account' => $request->input('organization_bank_account'),
                    'contact_person_last_name' => $request->input('contact_person_last_name'),
                    'contact_person_first_name' => $request->input('contact_person_first_name'),
                    'organization_county_id' => $request->input('company_information.organization_county_id'),
                    'organization_city_id' => $request->input('company_information.organization_city_id'),
                    'organization_address' => $request->input('company_information.organization_address'),
                ];
                $companyCityId = $companyInformationArray['organization_city_id'];
            }

            $dbOrder->total_no_tva = floor($dbOrder->total * (100 / TvaHelper::getPriceWithTvaRate()) * 100) / 100;
            // Calculate rambursValue if delivery_type is 0 (curier)
            $rambursValue = 0;
            $rambursTva = 0;
            if ($request->input('delivery_type') == 0 && $request->input('payment_method') == 'ramburs') {
                // rambursValue is 3% of the order value(value of the products+transport price) without TVA, so it is 3% of of $dbOrder->total_no_tva
                $rambursValue = round(($dbOrder->total_no_tva + $dbOrder->transport_price) * 3 / 100, 2);
                $rambursTva = round($rambursValue * TvaHelper::getTvaRate() / 100, 2);
                // Add the cost of ramburs(rambursValue+rambursTva) to the total
                $dbOrder->total += floor(($rambursValue + $rambursTva) * 100) / 100;
                $dbOrder->total_no_tva += $rambursValue;
            }

            $dbOrder->transport_price_no_tva = $dbOrder->transport_price;
            $dbOrder->transport_price = floor((TvaHelper::getPriceWithTvaMultiplier() * $dbOrder->transport_price_no_tva) * 100) / 100;
            $dbOrder->total = floor(($dbOrder->total + $dbOrder->transport_price) * 100) / 100;
            $dbOrder->total_no_tva += $dbOrder->transport_price_no_tva;

            $deliveryInformation = null;
            $deliveryInformationArray = null;
            // Copy the billing data(company_information) in the delivery data, if that option is checked
            if ($request->input('delivery_data_same_as_billing')) {
                // Persoană fizică
                if ($request->input('billing_type') == 0) { 
                    $deliveryInformationArray = [
                        'delivery_last_name' => $request->input('person_last_name'),
                        'delivery_first_name' => $request->input('person_first_name'),
                        'delivery_phone' => $request->input('person_phone'),
                        'delivery_email' => $request->input('person_email'),
                        'delivery_county_id' => $request->input('company_information.person_county_id'),
                        'delivery_city_id' => $personCityId,
                        'delivery_address' => $request->input('company_information.person_address'),
                    ];
                // Persoană juridică
                } elseif ($request->input('billing_type') == 1) { 
                    $deliveryInformationArray = [
                        'delivery_last_name' => $request->input('contact_person_last_name'),
                        'delivery_first_name' => $request->input('contact_person_first_name'),
                        'delivery_phone' => $request->input('organization_phone'),
                        'delivery_email' => $request->input('organization_email'),
                        'delivery_county_id' => $request->input('company_information.organization_county_id'),
                        'delivery_city_id' => $companyCityId,
                        'delivery_address' => $request->input('company_information.organization_address'),
                    ];
                }
            } else {
                // If the deliery data(deliveryInformation) is not the same as the billing data(companyInformation), use the value from the delivery inputs
                if ($request->input('delivery_type') == 0) { // Curier
                    $deliveryInformationArray = [
                        'delivery_last_name' => $request->input('delivery_last_name'),
                        'delivery_first_name' => $request->input('delivery_first_name'),
                        'delivery_phone' => $request->input('delivery_phone'),
                        'delivery_email' => $request->input('delivery_email'),
                        'delivery_county_id' => $request->input('delivery_information.delivery_county_id'),
                        'delivery_city_id' => $request->input('delivery_information.delivery_city_id'),
                        'delivery_address' => $request->input('delivery_address'),
                    ];
                }
            }

            if ($deliveryInformationArray){
                $deliveryCityId = $deliveryInformationArray['delivery_city_id'];
            }

            if ($request->input('delivery_type') == 0) { // Livrare prin curier
                
                // Update the cost of ramburs if the selected payment method is 'ramburs'
                if ($request->input('payment_method') == 'ramburs') {
                    $deliveryInformationArray['ramburs_value'] = number_format($rambursValue, 2, '.', '');
                    $deliveryInformationArray['ramburs_tva'] = number_format($rambursTva, 2, '.', '');
                }

                // Convert to JSON
                $deliveryInformation = json_encode($deliveryInformationArray);
            }

            // Convert contact_information to JSON
            $contactInformation = null;
            if ($request->input('delivery_type') == 0) { // Livrare prin curier
                $contactInformation = json_encode([
                    'email' => $deliveryInformationArray['delivery_email'],
                    'phone' => $deliveryInformationArray['delivery_phone'],
                ]);
            }

            // Update the order
            $dbOrder->update([
                'billing_type' => $request->input('billing_type'),
                'delivery_type' => $request->input('delivery_type'),
                'payment_method' => $request->input('payment_method'),
                'person_city_id' => $personCityId,
                'company_city_id' => $companyCityId,
                'delivery_city_id' => $deliveryCityId,
                'company_information' => json_encode($companyInformationArray),  
                'is_paid' => true,
                'delivery_information' => $deliveryInformation,
                'contact_information' => $contactInformation, 
            ]);

            if (Auth::check()){
                // Check if `company_information` is a string. If it's a JSON string, decode it, otherwise convert stdClass to array
                $companyInformationUser = is_string($user->company_information)
                    ? json_decode($user->company_information, true) 
                    : (array) $user->company_information;

                // Check if `delivery_information` is a string. If it's a JSON string, decode it, otherwise convert stdClass to array
                $deliveryInformationUser = is_string($user->delivery_information)
                    ? json_decode($user->delivery_information, true)
                    : (array) $user->delivery_information;

                $companyInformation = $companyInformationArray;

                if ($request->input('billing_type') == 0) { // Persoană fizică
                    $companyInformationUser['person_last_name'] = $companyInformation['person_last_name'] ?? null;
                    $companyInformationUser['person_first_name'] = $companyInformation['person_first_name'] ?? null;
                    $companyInformationUser['person_phone'] = $companyInformation['person_phone'] ?? null;
                    $companyInformationUser['person_email'] = $companyInformation['person_email'] ?? null;
                    $companyInformationUser['person_county_id'] = $companyInformation['person_county_id'] ?? null;
                    $companyInformationUser['person_city_id'] = $companyInformation['person_city_id'] ?? null;
                    $companyInformationUser['person_address'] = $companyInformation['person_address'] ?? null;
                } elseif ($request->input('billing_type') == 1) { // Persoană juridică
                    $companyInformationUser['organization_name'] = $companyInformation['organization_name'] ?? null;
                    $companyInformationUser['organization_cui'] = $companyInformation['organization_cui'] ?? null;
                    $companyInformationUser['organization_phone'] = $companyInformation['organization_phone'] ?? null;
                    $companyInformationUser['organization_email'] = $companyInformation['organization_email'] ?? null;
                    $companyInformationUser['organization_bank'] = $companyInformation['organization_bank'] ?? null;
                    $companyInformationUser['organization_bank_account'] = $companyInformation['organization_bank_account'] ?? null;
                    $companyInformationUser['contact_person_last_name'] = $companyInformation['contact_person_last_name'] ?? null;
                    $companyInformationUser['contact_person_first_name'] = $companyInformation['contact_person_first_name'] ?? null;
                    $companyInformationUser['organization_county_id'] = $companyInformation['organization_county_id'] ?? null;
                    $companyInformationUser['organization_city_id'] = $companyInformation['organization_city_id'] ?? null;
                    $companyInformationUser['organization_address'] = $companyInformation['organization_address'] ?? null;
                }

                // Update the delivery information only if we chose 'curier' as delivery method
                if ($deliveryInformationArray !== null) {
                    $deliveryInformationUser['delivery_last_name'] = $deliveryInformationArray['delivery_last_name'] ?? null;
                    $deliveryInformationUser['delivery_first_name'] = $deliveryInformationArray['delivery_first_name'] ?? null;
                    $deliveryInformationUser['delivery_phone'] = $deliveryInformationArray['delivery_phone'] ?? null;
                    $deliveryInformationUser['delivery_email'] = $deliveryInformationArray['delivery_email'] ?? null;
                    $deliveryInformationUser['delivery_county_id'] = $deliveryInformationArray['delivery_county_id'] ?? null;
                    $deliveryInformationUser['delivery_city_id'] = $deliveryInformationArray['delivery_city_id'] ?? null;
                    $deliveryInformationUser['delivery_address'] = $deliveryInformationArray['delivery_address'] ?? null;
                }

                // Update the user with the new data
                $user->update([
                    'company_information' => json_encode($companyInformationUser),
                    'delivery_information' => $deliveryInformationUser !== null ? json_encode($deliveryInformationUser) : $user->delivery_information,
                    'billing_type' => $request->input('billing_type'),
                ]);
            }


            // Get the products from the order
            $orders_products = $dbOrder->productVariations()->withPivot('quantity', 'price', 'price_no_vat')->get();
            $billingCountyId = null;
            $billingCountyName = 'Necunoscut';

            // Billing County
            if ($dbOrder->billing_type == 0) {  // Persoană fizică
                $billingCountyId = json_decode($dbOrder->company_information, true)['person_county_id'] ?? null;
            } elseif ($dbOrder->billing_type == 1) {  // Persoană juridică
                $billingCountyId = json_decode($dbOrder->company_information, true)['organization_county_id'] ?? null;
            }
            if ($billingCountyId) {
                $billingCounty = County::where('id', $billingCountyId)->first();
                $billingCountyName = $billingCounty ? $billingCounty->name : 'Necunoscut';
            }

            // Billing City
            if ($dbOrder->billing_type == 0) {  // Persoană fizică
                $billingCityId = json_decode($dbOrder->company_information, true)['person_city_id'] ?? null;
            } elseif ($dbOrder->billing_type == 1) {  // Persoană juridică
                $billingCityId = json_decode($dbOrder->company_information, true)['organization_city_id'] ?? null;
            }
            $billingCity = $billingCityId ? City::find($billingCityId) : null;
            $billingCityName = $billingCity ? $billingCity->name : 'Necunoscut';

            // Delivery County and City
            $deliveryInfo = json_decode($dbOrder->delivery_information, true);
            $deliveryCountyId = $deliveryInfo['delivery_county_id'] ?? null;
            $deliveryCityId = $deliveryInfo['delivery_city_id'] ?? null;
            $deliveryCounty = $deliveryCountyId ? County::find($deliveryCountyId) : null;
            $deliveryCity = $deliveryCityId ? City::find($deliveryCityId) : null;

            // Address
            $address = ($dbOrder->billing_type == 0 
                    ? json_decode($dbOrder->company_information, true)['person_address'] 
                    : json_decode($dbOrder->company_information, true)['organization_address']) . "\n";

            // dd($address);

            // Generate the PDF for proforma
            $pdf = PDF::loadView('products.invoice-pdf', [
                'order' => $dbOrder,
                'orders_products' => $orders_products,
                'billingCountyName' => $billingCountyName,
                'billingCityName' => $billingCityName,
                'address' => $address,
            ]);

            try {
                // Log before saving the pdf file
                Log::info('Salvăm PDF-ul proformei', [
                    'order_id' => $dbOrder->id,
                    'identifier' => $dbOrder->identifier,
                ]);

                // File and path of the PDF file
                $fileName = 'proforma_RTCH-N-' . $dbOrder->identifier . '.pdf';
                $filePath = 'media/proforma-invoices/' . $fileName;

                Storage::disk('public')->put($filePath, $pdf->output());

                Log::info('PDF-ul a fost salvat cu succes', [
                    'file_path' => $filePath
                ]);

                // Save the file info on media
                $media = Media::create([
                    'disk' => 'public',
                    'directory' => 'media/proforma-invoices',
                    'visibility' => 'public',
                    'name' => $fileName,
                    'path' => 'media/proforma-invoices/' . $fileName,
                    'type' => 'application/pdf',
                    'ext' => 'pdf',
                ]);

                Log::info('Informațiile PDF-ului au fost salvate în tabela media', [
                    'media_id' => $media->id
                ]);

                // Asociem fișierul PDF cu comanda
                $dbOrder->proforma_id = $media->id;
                $dbOrder->save();

                Log::info('PDF-ul a fost asociat cu comanda', [
                    'order_id' => $dbOrder->id,
                    'proforma_id' => $dbOrder->proforma_id
                ]);
            }
            catch (\Exception $e) {
                // Log the error in case it appears
                Log::error('A apărut o eroare la salvarea PDF-ului', [
                    'message' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);

                echo $e->getMessage();
            }

            // Send email with info about the order
            try {
                $emexEmail = 'comenzi@emex.ro'; 
                $clientEmail = $dbOrder->billing_type == 0
                    ? json_decode($dbOrder->company_information, true)['person_email']
                    : json_decode($dbOrder->company_information, true)['organization_email'];
                $clientName = $dbOrder->billing_type == 0
                    ? json_decode($dbOrder->company_information, true)['person_first_name'] . ' ' . json_decode($dbOrder->company_information, true)['person_last_name']
                    : json_decode($dbOrder->company_information, true)['organization_name'];

                // Create the email content
                // Discounts by product
                $discountsByProduct = [];
                $bulkDiscounts = [];

                foreach ($dbOrder->discountCodes as $dc) {
                    if ($dc->products->count() > 0) {
                        foreach ($dc->products as $p) {
                            $discountsByProduct[$p->id][] = $dc;
                        }
                    } else {
                        $bulkDiscounts[] = $dc;
                    }
                }

                // Product section
                $emailContent = "S-au comandat următoarele produse:\n\n";

                foreach ($orders_products as $product) {
                    $quantity = $product->pivot->quantity;
                    $price_no_vat = round($product->pivot->price_no_vat, 2);
                    $total_no_vat = round($price_no_vat * $quantity, 2);

                    $productId = $product->product_id ?? ($product->product->id ?? null);
                    $discountsForProduct = $discountsByProduct[$productId] ?? [];

                    if (empty($discountsForProduct) && !empty($bulkDiscounts)) {
                        $discountsForProduct = $bulkDiscounts;
                    }

                    $emailContent .= "Produs: {$product->name}\n";
                    $emailContent .= "Culoare: " . ($product->colour ?? 'Alb') . "\n";
                    $emailContent .= "Cantitate: {$quantity}\n";
                    $emailContent .= "Preț final cu TVA: " . number_format($product->pivot->price, 2) . "\n";

                    foreach ($discountsForProduct as $discount) {
                        $discountPercent = $discount->percentage;
                        $price_no_vat_initial = round($price_no_vat / (1 - $discountPercent / 100), 2);
                        $total_no_vat_initial = round($price_no_vat_initial * $quantity, 2);

                        $emailContent .= "Discount aplicat: {$discount->code} ({$discountPercent}%)\n";
                        $emailContent .= "Preț inițial cu TVA: " . number_format($price_no_vat_initial * TvaHelper::getPriceWithTvaMultiplier(), 2) . "\n";
                    }

                    $emailContent .= "Mențiuni: " . ($product->pivot->mentions ?? '-') . "\n\n";
                }



                if ($dbOrder->transport_price > 0) {
                    $emailContent .= "Transport:\n" . "Cantitate: 1\n" . "Pret cu TVA: " . number_format($dbOrder->transport_price, 2) . " lei (cu TVA)\n\n";
                }
                
                if ($rambursValue > 0) {
                    $emailContent .= "Cost Ramburs:\n" . "Cantitate: 1\n" . "Pret cu TVA: " . number_format($rambursValue + $rambursTva, 2) . " lei (cu TVA)\n\n";
                }

                $emailContent .= "Total inclusiv TVA: " . number_format($dbOrder->total, 2) . "\n";

                $emailContent .= "Detalii facturare:\n";
                $emailContent .= "Tip: " . ($dbOrder->billing_type == 0 ? 'Persoana fizica' : 'Persoana juridica') . "\n";
                $emailContent .= "Nume: " . ($dbOrder->billing_type == 0 
                    ? json_decode($dbOrder->company_information, true)['person_first_name'] . ' ' . json_decode($dbOrder->company_information, true)['person_last_name'] 
                    : json_decode($dbOrder->company_information, true)['organization_name']) . "\n";
                $emailContent .= "Numar de telefon: " . ($dbOrder->billing_type == 0 
                    ? json_decode($dbOrder->company_information, true)['person_phone'] ?? '-' 
                    : json_decode($dbOrder->company_information, true)['organization_phone'] ?? '-') . "\n";
                $emailContent .= "Adresa de email: " . $clientEmail . "\n";
                $emailContent .= "Județ: " . ($billingCounty ? $billingCounty->name : 'Necunoscut') . "\n";
                $emailContent .= "Localitate: " . ($billingCity ? $billingCity->name : 'Necunoscut') . "\n";
                $emailContent .= "Adresa: " . ($dbOrder->billing_type == 0 
                    ? json_decode($dbOrder->company_information, true)['person_address'] 
                    : json_decode($dbOrder->company_information, true)['organization_address']) . "\n";
                if ($dbOrder->billing_type == 1) {
                    $emailContent .= "CUI: " . json_decode($dbOrder->company_information, true)['organization_cui'] . "\n";
                    $emailContent .= "Persoană de contact: " . 
                        json_decode($dbOrder->company_information, true)['contact_person_first_name'] . ' ' . 
                        json_decode($dbOrder->company_information, true)['contact_person_last_name'] . "\n";
                }
                $emailContent .= "\n";
                
                $emailContent .= "Detalii livrare:\n";
                $emailContent .= "Tip: " . ($dbOrder->delivery_type == 0 ? "Livrare prin curier" : "Ridicare personală") . "\n";
                if($dbOrder->delivery_type == 0){
                    $emailContent .= "Nume: " . ($deliveryInfo['delivery_first_name'] ?? '-') . " " . ($deliveryInfo['delivery_last_name'] ?? '-') . "\n";
                    $emailContent .= "Telefon: " . ($deliveryInfo['delivery_phone'] ?? '-') . "\n";
                    $emailContent .= "Email: " . ($deliveryInfo['delivery_email'] ?? '-') . "\n";
                    $emailContent .= "Județ: " . ($deliveryCounty ? $deliveryCounty->name : 'Necunoscut') . "\n";
                    $emailContent .= "Localitate: " . ($deliveryCity ? $deliveryCity->name : 'Necunoscut') . "\n";
                    $emailContent .= "Adresă: " . ($deliveryInfo['delivery_address'] ?? '-') . "\n";
                }
                $emailContent .= "\n";
                
                $emailContent .= "Detalii plată:\n";
                $emailContent .= "Tip: ";
                if ($dbOrder->payment_method == "card") {
                    $emailContent .= "Card bancar\n";
                } elseif ($dbOrder->payment_method == "ordin de plata") {
                    $emailContent .= "Ordin de plată\n";
                } elseif ($dbOrder->payment_method == "transfer bancar") {
                    $emailContent .= "Transfer bancar\n";
                } elseif ($dbOrder->payment_method == "ramburs") {
                    $emailContent .= "Ramburs\n";
                }
                    

                // Send the email to the client
                Mail::raw($emailContent, function ($message) use ($clientEmail, $dbOrder, $filePath) {
                    $message->to($clientEmail)
                        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                        ->subject('Romtehnochim: Comanda Receptionata')
                        ->attach(Storage::disk('public')->path($filePath)); 
                });
                Log::info('Email trimis cu succes către client:', [
                    'email' => $clientEmail,
                    'order_id' => $dbOrder->id,
                ]);

                // Send the email to Emex
                Mail::raw($emailContent, function ($message) use ($emexEmail, $dbOrder, $filePath, $clientEmail, $clientName) {
                    $message->to($emexEmail)
                        ->from($clientEmail, $clientName) 
                        ->subject('Comanda')
                        ->attach(Storage::disk('public')->path($filePath)); 
                });
                Log::info('Email trimis cu succes către Emex:', [
                    'email' => $emexEmail,
                    'order_id' => $dbOrder->id,
                ]);

            } catch (\Exception $e) {
                Log::error('A apărut o eroare la trimiterea emailurilor:', [
                    'message' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
            }

            session()->forget('cart');
            session()->forget('order');
            session()->forget('discounts');

            // Redirect the user to summary after order has been processed
            return redirect()->route('order.summary', ['guid' => $dbOrder->guid])->with('success', 'Comanda a fost plasată cu succes.');
        }

        session()->forget('cart');
        session()->forget('order');
        session()->forget('discounts');

        return redirect()->route('/despre-noi');
    }

    public function showSummary(Request $request)
    {
        $guid = $request->route('guid');

        // Find the order based on guid
        $order = Order::where('guid', $guid)->first();

        // Verify if the order exists and if the user is logged in
        if (!$order) {
            return redirect()->route('blog.index')->with('error', 'Comanda nu a fost găsită.');
        }

        $orders_products = $order->productVariations()->withPivot('quantity', 'price', 'price_no_vat')->get();

        $county = 0;
        $countyName = 0;
        $city = 0;

        // Livrare prin curier
        if ($order->delivery_type == 0) {  
            $county = County::where('id', $order->delivery_county_id)->first();
            $countyName = $county ? $county->name : 'Necunoscut';
            $city = $order->delivery_information['delivery_city'] ?? ''; 
        }

        $billingCountyId = null;
        $billingCountyName = 'Necunoscut';

        // Get billing city and billing county
        if ($order->billing_type == 0) {  // Persoană fizică
            $billingCountyId = json_decode($order->company_information, true)['person_county_id'] ?? null;
            $billingCityId = json_decode($order->company_information, true)['person_city_id'] ?? null;
        } elseif ($order->billing_type == 1) {  // Persoană juridică
            $billingCountyId = json_decode($order->company_information, true)['organization_county_id'] ?? null;
            $billingCityId = json_decode($order->company_information, true)['organization_city_id'] ?? null;
        }

        if ($billingCountyId) {
            $billingCounty = County::where('id', $billingCountyId)->first();
            $billingCountyName = $billingCounty ? $billingCounty->name : 'Necunoscut';
        }

        if($billingCityId) {
            $billingCity = City::find($billingCityId);
            $billingCityName = $billingCity ? $billingCity->name : 'Necunoscut';
        } else {
            $billingCityName = 'Necunoscut';
        }

        // Generate the conversion value
        $conversion_value = 0;
        foreach ($orders_products as $product) {
            if ($product->name !== 'Transport' && $product->name !== 'Cost Ramburs') {
                $conversion_value += $product->pivot->price_no_tva * $product->pivot->quantity;
            }
        }

        $conversion_value = number_format(round($conversion_value, 2), 2, '.', ',');

        // Verify if the link is valid
        $valid_link = 1;

        return view('products.summary', compact('order', 'orders_products','billingCountyName', 'billingCityName', 'county', 'countyName', 'city', 'valid_link', 'conversion_value'));
    }
    
    public function validateAccount(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
            ],
            [
                'email.required' => 'Adresa de email este obligatorie.',
                'email.email' => 'Adresa de email nu este validă.',
                'email.unique' => 'Această adresă de email este deja folosită.',
                'password.required' => 'Parola este obligatorie.',
                'password.min' => 'Parola trebuie să conțină cel puțin :min caractere.',
            ]
        );

        $errors = [];

        if ($validator->fails()) {
            if ($validator->errors()->has('email')) {
                $errors['email'] = $validator->errors()->first('email');
            }

            if ($validator->errors()->has('password')) {
                $errors['password'] = $validator->errors()->first('password');
            }

            return response()->json([
                'success' => false,
                'errors' => $errors
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function updateMention(Request $request)
    {
        $productVariationId = $request->input('product_variation_id');
        $mention = $request->input('mention', ''); 
        $cart = session()->get('cart', []);

        // If the product exists, update the mention
        if (isset($cart[$productVariationId])) {
            $cart[$productVariationId]['mentions'] = $mention; 
        }

        // Save the updated cart in session
        session()->put('cart', $cart);

        return response()->json(['success' => true, 'message' => 'Mențiunea a fost salvată.']);
    }


}