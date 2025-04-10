<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        return view('homepage');
    }

    public function search()
    {
        $search_url = url('search-script/search.php') . '?' . http_build_query($_GET);
        $results = file_get_contents($search_url);

        return view('search', ['results' => $results]);
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
                $params = $request->query();
                $params['consumption_slug'] = $slug;
                return app(ConsumController::class)->show($slug, $params);
                // return redirect()->route('consum.show', $params);
                // return app(ConsumController::class)->calculate($slug, $request);
            }
            else {
                $params = $request->query();
                return app(ConsumController::class)->show($slug, $params);
            }
        }

        abort(404);
    }
}
