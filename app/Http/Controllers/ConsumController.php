<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ConsumController extends Controller
{
    public function index($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        // Get the first product from that category which has a valid consumption_slug
        $firstProduct = $category->products()
            ->whereNotNull('consumption_slug')
            ->where('consumption_slug', '!=', '')
            ->orderBy('order', 'asc')
            ->first();

        if ($firstProduct) {
            return redirect()->route('consum.show', ['consumption_slug' => $firstProduct->consumption_slug]);
        }

        return redirect()->back()->with('error', 'Nu există produse în această categorie.');
    }

    public function show($consumption_slug, Request $request)
    {
        $product = Product::where('consumption_slug', $consumption_slug)
            ->with(['categories', 'largeImage', 'variations', 'reviews', 'technicalFile'])
            ->firstOrFail();
    
        $category = $product->categories->first();
        $consumData = $this->getConsumDataByProduct($product);
        $isCalculatePage = str_contains($request->url(), '/calculate');
        $currentPage = $isCalculatePage ? 3 : $request->input('currentPage', 0);
    
        // Verify if there is data in the request to calculate the consumption
        $result = null;
        if ($isCalculatePage || $request->has(['calculate', 'product_id', 'TipProdus', 'TipSuprafata', 'Suprafata'])) {
            $calculationData = $request->all();
            $result = $this->calculateConsumption($calculationData);
        }
    
        return view('consum.view', [
            'product' => $product,
            'category' => $category,
            'consumData' => $consumData,
            'currentPage' => $currentPage, 
            'result' => $result,
        ]);
    }
    

    public function store(Request $request)
    {
        $data = $request->except(['_token', 'consumption_slug']); 

        return redirect()->to(url($request->input('product_id') . '/calculate') . '?' . http_build_query($data));
    }


    public function calculateConsumption($data)
    {
        $product_id = $data['product_id'];
        $product = Product::find($product_id);
        $consum_data = $this->getConsumDataByProduct($product);

        $_GET['TipSuprafata'] = $data[$consum_data['suprafata_type_name']];
        $_GET['Suprafata'] = $data[$consum_data['suprafata_name']];
        $_GET['TipProdus'] = $consum_data['vopsea_type'];


        $script_name = $product->consumption_slug . '.php';
        $script_path = app_path('Http/Controllers/consumuri_scripts/' . $script_name);

        if (file_exists($script_path)) {
            ob_start();

            include $script_path;

            $html_result = ob_get_clean();
            return $html_result;
        } else {
            return '<p>Nu există un script disponibil pentru calculul acestui produs.</p>';
        }
    }

    private function getConsumDataByProduct($product)
    {
        $consumuri_csv = public_path('data/consumuri.csv');
        $handler = fopen($consumuri_csv, "r");
        $row = 0;
        $consumuri = [];
        while (($data = fgetcsv($handler, 1000, ",")) !== FALSE) {
            if ($row > 0) {
                $product_slug = str_replace('https://emex.ro/', '', $data[0]);
                $product_slug = str_replace('.htm', '', $product_slug);

                $consumuri[$product_slug]['product_slug'] = $product_slug;
                $consumuri[$product_slug]['current_url'] = $data[0];
                $consumuri[$product_slug]['category'] = $data[1];
                $consumuri[$product_slug]['vopsea_type'] = $data[2];
                $consumuri[$product_slug]['suprafata_type'] = $data[3];

                $tipuri_suprafata = explode(',', $data[3]);
                $consumuri[$product_slug]['suprafata_types'] = $tipuri_suprafata;

                $consumuri[$product_slug]['suprafata_type_name'] = $data[4];
                $consumuri[$product_slug]['suprafata_name'] = $data[5];
                $consumuri[$product_slug]['script_name'] = $data[6];
            }

            $row++;
        }

        fclose($handler);

        if (empty($consumuri[$product->consumption_slug])) {
            foreach ($consumuri as $consum) {
                return $consum;
            }
        }

        return $consumuri[$product->consumption_slug];
    }
}