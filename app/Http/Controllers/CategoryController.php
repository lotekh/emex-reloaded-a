<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategory($slug)
    {
        $categories = Category::all();

        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->products()->with('featuredImage')->paginate(6);

        $total_results = $category->products()->count();
        $per_page = request()->get('per_page', 6);
        $numsPerPage = [6, 12, 24, 48];
        $total_pages = ceil($total_results / $per_page);

        return view('categories.view', compact('category', 'categories', 'products', 'total_results', 'per_page', 'numsPerPage', 'total_pages'));
    }
}
