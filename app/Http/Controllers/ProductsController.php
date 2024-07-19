<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Afișează lista de produse.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('categories.vopsele-lavabile2', compact('products', 'categories'));
    }
}
