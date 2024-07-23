<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
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
}
