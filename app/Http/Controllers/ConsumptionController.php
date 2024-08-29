<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\CategoriesProducts;
use Illuminate\Http\Request;

class ConsumptionController extends Controller
{
    public function show($slug)
    {
        // Găsim produsul bazat pe slug
        $product = Product::where('slug', $slug)->firstOrFail();
        
        // Preluăm categoria produsului
        $categories_product = CategoriesProducts::with('category')
            ->where('product_id', $product->id)
            ->get();

        // Preluăm alte produse din aceeași categorie
        $category_id = $categories_product->first()->category_id;
        $productCategories = CategoriesProducts::where('category_id', $category_id)
            ->with('product')
            ->orderBy('sort_priority', 'asc')
            ->get();

        return view('consum.view', compact('product', 'categories_product', 'productCategories'));
    }
}
