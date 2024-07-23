<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function showProduct($slug, Request $request)
    {
        $categories = Category::all(); // Pentru a include toate categoriile

        $product = Product::where('slug', $slug)->with('featuredImage')->firstOrFail();

        $initialPrice = $product->variations['initials']['price'];
        $initialPackaging = $product->variations['initials']['packaging'];
        $initialColor = $product->variations['initials']['color'];
        $initialName = $product->variations['initials']['name'];
        $initialPriceNoTva = $product->variations['initials']['price_no_tva'];
        $initialIntaritor = $product->variations['initials']['intaritor'];
        $initialEan = $product->variations['initials']['ean'];
        $initial_q = 1;

        $parsedFullData = $product->variations['parsedData'];

        $rating_sum = 0;
        if (!empty($product->reviews)) {
            $rating_sum = array_reduce($product->reviews, function ($carry, $item) {
                return $carry + $item['rating'];
            }, 0) / count($product->reviews);
        }

        return view('products.view', compact(
            'product', 
            'categories',
            'initialPrice',
            'initialPackaging',
            'initialColor',
            'initialName',
            'initialPriceNoTva',
            'initialIntaritor',
            'initialEan',
            'initial_q',
            'parsedFullData',
            'rating_sum'
        ));
    }
}
