<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategory($categorySlug)
    {
        $categories = Category::all();

        // Găsește categoria după slug
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        // Obține produsele asociate categoriei
        $products = $category->products()->paginate(6); // Paginare pentru 6 produse pe pagină

        // Numărul total de produse găsite pentru categoria respectivă
        $total_results = $category->products()->count();

        // Transmite datele către view
        return view('categories.view', compact('category', 'categories', 'products', 'total_results'));
    }
}

