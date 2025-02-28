<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('homepage');
    }

    public function handleSlug($slug, Request $request)
    {
        // Verifiy if the slug is for category page
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            $request->merge(['is_category_page' => true]);
            return app(CategoryController::class)->showCategory($slug, $request);
        }

        // Verifiy if the slug is for product page
        $product = Product::where('slug', $slug)->first();
        if ($product) {
            $request->merge(['is_product_page' => true]);
            return app(ProductsController::class)->showProduct($slug, $request);
        }

        // Verifiy if the slug is for consum page
        $consumptionProduct = Product::where('consumption_slug', $slug)->first();
        if ($consumptionProduct) {
            $request->merge(['is_consum_page' => true]);

            // If the url has `calculate=1`, redirect to the calculate route
            if ($request->has('calculate')) {
                return redirect()->route('consum.calculate', $request->query());
            }

            return app(ConsumController::class)->show($slug, $request);
        }

        abort(404);
    }
}
