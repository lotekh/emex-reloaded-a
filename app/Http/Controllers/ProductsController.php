<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use App\Models\CategoryFilter;


class ProductsController extends Controller
{

    // public function index(Request $request)
    // {
    //     $perPage = $request->get('per_page', 9);
    //     $currentPage = $request->get('current_page_number', 1);
    //     $filters = $request->except(['per_page', 'current_page_number']);
    //     $filtersString = '?' . http_build_query($filters);

    //     // Interogare pentru produse active
    //     $productsQuery = Product::where('active', 1);

    //     // Preluarea tuturor filtrelor
    //     $filtersSelected = [];

    //     foreach ($filters as $key => $value) {
    //         // Verificăm dacă filtrul este un checkbox (de exemplu "category2" => "on")
    //         if (strpos($key, 'category') === 0 && $value === 'on') {
    //             $filterId = str_replace('category', '', $key);
    //             $filtersSelected[] = $filterId;
    //         }
    //     }

    //     // Dacă avem filtre selectate, aplicăm filtrarea cu OR pentru filtre din aceeași categorie
    //     if (!empty($filtersSelected)) {
    //         $productsQuery->whereHas('categoryfilters', function ($query) use ($filtersSelected) {
    //             $query->whereIn('category_filters.id', $filtersSelected);
    //         });
    //     }

    //     // Paginarea și colectarea produselor
    //     $products = $productsQuery->paginate($perPage, ['*'], 'page', $currentPage);
    //     $totalResults = $products->total();
    //     $totalPages = $products->lastPage();

    //     // Preluăm filtrele pentru a le afișa pe pagină
    //     // $filters = CategoryFilter::with('children')->get();
    //     $filters = CategoryFilter::with('children')
    //     ->whereNull('category_filter_id') // Doar filtrele părinte
    //     ->get();


    //     return view('products.produse', compact('products', 'totalResults', 'totalPages', 'perPage', 'currentPage', 'filtersString', 'filters'));
    // }


    public function index(Request $request)
{
    $perPage = $request->get('per_page', 9);
    $currentPage = $request->get('current_page_number', 1);
    $filters = $request->except(['per_page', 'current_page_number']);
    $filtersString = '?' . http_build_query($filters);

    // Interogare pentru produse active
    $productsQuery = Product::where('active', 1);

    // Preluăm filtrele din request
    $filtersSelected = [];

    foreach ($filters as $key => $value) {
        // Verificăm dacă filtrul este un checkbox (de exemplu "category2" => "on")
        if (strpos($key, 'category') === 0 && $value === 'on') {
            $filterId = str_replace('category', '', $key);
            $filtersSelected[] = $filterId;
        }
    }

    // Grupăm filtrele selectate după categoria lor părinte
    $filtersGrouped = CategoryFilter::whereIn('id', $filtersSelected)
        ->get()
        ->groupBy('category_filter_id');

    // Aplicăm filtrele la query
    foreach ($filtersGrouped as $parentCategoryId => $filterGroup) {
        $productsQuery->whereHas('categoryfilters', function ($query) use ($filterGroup) {
            $filterIds = $filterGroup->pluck('id');
            $query->whereIn('category_filters.id', $filterIds);
        });
    }

    // Paginarea și colectarea produselor
    $products = $productsQuery->paginate($perPage, ['*'], 'page', $currentPage);
    $totalResults = $products->total();
    $totalPages = $products->lastPage();

    // Preluăm filtrele pentru a le afișa pe pagină
    $filters = CategoryFilter::with('children')->whereNull('category_filter_id')->get();

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

        $firstFourProducts = Product::take(4)->get();

        return view('products.view', compact('product', 'firstFourProducts','categories_products', 'initialPrice', 'initialPackaging', 'initialColor', 'initialName', 'initialPriceNoTva', 'initialIntaritor', 'initialEan', 'initial_q', 'parsedFullData', 'rating_sum'));
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
