<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategory($slug, Request $request)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();

        $per_page = $request->input('per_page', 6);
        $current_page = $request->input('page', 1);

        $products = $category->products()
                             ->with('variations', 'reviews')
                             ->orderBy('categories_products.order')
                             ->paginate($per_page, ['*'], 'page', $current_page);

        // dd($products);

        $total_results = $products->total();
        $total_pages = $products->lastPage();

        $numsPerPage = [6, 12, 24, 48];

        return view('categories.view', compact('category', 'categories', 'products', 'total_results', 'total_pages', 'per_page', 'current_page', 'numsPerPage'));
    }
}
