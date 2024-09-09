<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 9);
        $currentPage = $request->get('current_page_number', 1);

        // Collect filters from the request, except pagination parameters
        $filters = $request->except(['per_page', 'current_page_number']);
        $filtersString = '?' . http_build_query($filters);
        // dd($filtersString);

        // Query the products, applying pagination
        $products = Product::where('active', 1) // Assuming you only want to show active products
            ->paginate($perPage, ['*'], 'page', $currentPage);

        $totalResults = $products->total();
        $totalPages = $products->lastPage();

        return view('products.produse', compact('products', 'totalResults', 'totalPages', 'perPage', 'currentPage', 'filtersString', 'filters'));
    }

    public function showProduct($slug, Request $request)
    {
        $product = Product::where('slug', $slug)->with('featuredImage', 'variations', 'reviews')->firstOrFail();

        $categories_products = $product->categories;

        $initialPrice = $product->variations->first()->price ?? 0;
        $initialPackaging = $product->variations->first()->packaging ?? '';
        $initialColor = $product->variations->first()->color ?? '';
        $initialName = $product->variations->first()->name ?? '';
        $initialPriceNoTva = $product->variations->first()->price_no_tva ?? 0;
        $initialIntaritor = $product->variations->first()->intaritor ?? '';
        $initialEan = $product->variations->first()->ean ?? '';
        $initial_q = 1;

        $parsedFullData = $product->variations;

        $rating_sum = $product->reviews->avg('rating') ?? 0;

        return view('products.view', compact('product', 'categories_products', 'initialPrice', 'initialPackaging', 'initialColor', 'initialName', 'initialPriceNoTva', 'initialIntaritor', 'initialEan', 'initial_q', 'parsedFullData', 'rating_sum'));
    }

    
    public function getVariation(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $color = $request->input('color');

        $variation = ProductVariation::where('product_id', $product_id)
                                    ->where('quantity', $quantity)
                                    ->where('colour', $color)
                                    ->first();

        if ($variation) {
            return response()->json([
                'success' => true,
                'variation' => $variation,
            ]);
        } else {
            return response()->json(['success' => false, 'error' => 'Variation not found'], 404);
        }
    }


}
