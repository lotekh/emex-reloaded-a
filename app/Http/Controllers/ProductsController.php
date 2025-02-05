<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use App\Models\CategoryFilter;


class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 9);
        $currentPage = $request->get('current_page_number', 1);
        $filters = $request->except(['per_page', 'current_page_number']);
        $filtersString = '?' . http_build_query($filters);

        // Query for active products
        $productsQuery = Product::select('products.*')
            ->join('categories_products', 'products.id', '=', 'categories_products.product_id')
            ->where('products.active', 1)
            ->orderBy('categories_products.category_id', 'asc') 
            ->orderBy('categories_products.order', 'asc'); 

        // Get filters from request
        $filtersSelected = [];
        foreach ($filters as $key => $value) {
            // Verify if the filter is a checkbox
            if (strpos($key, 'category') === 0 && $value === 'on') {
                $filterId = str_replace('category', '', $key);
                $filtersSelected[] = $filterId;
            }
        }

        // Group filters based on their parent category
        $filtersGrouped = CategoryFilter::whereIn('id', $filtersSelected)
            ->get()
            ->groupBy('category_filter_id');

        // Apply filters on query
        foreach ($filtersGrouped as $parentCategoryId => $filterGroup) {
            $productsQuery->whereHas('categoryfilters', function ($query) use ($filterGroup) {
                $filterIds = $filterGroup->pluck('id');
                $query->whereIn('category_filters.id', $filterIds);
            });
        }

        $products = $productsQuery->paginate($perPage, ['*'], 'page', $currentPage);
        $totalResults = $products->total();
        $totalPages = $products->lastPage();

        $filters = CategoryFilter::with('children')->whereNull('category_filter_id')->get();

        return view('products.produse', compact('products', 'totalResults', 'totalPages', 'perPage', 'currentPage', 'filtersString', 'filters'));
    }

    public function showProduct($slug, Request $request)
    {
        $product = Product::where('slug', $slug)->with('largeImage', 'variations', 'reviews')->firstOrFail();

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

        $firstFourProducts = Product::take(4)->get();

        return view('products.view', compact('product', 'firstFourProducts', 'categories_products', 'initialPrice', 'initialPackaging', 'initialColor', 'initialName', 'initialPriceNoTva', 'initialIntaritor', 'initialEan', 'initial_q', 'parsedFullData', 'rating_sum'));
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
