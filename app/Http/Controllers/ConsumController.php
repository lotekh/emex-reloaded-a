<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ConsumController extends Controller
{
    public function index($categorySlug)
    {
        // Găsește categoria după slug
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        // Get the first product from that category which has a valid consumption_slug
        $firstProduct = $category->products()
            ->whereNotNull('consumption_slug')
            ->where('consumption_slug', '!=', '')
            ->orderBy('order', 'asc')
            ->first();

        if ($firstProduct) {
            // Redirecționează către URL-ul consumului folosind `consumption_slug`
            return redirect()->route('consum.show', ['consumption_slug' => $firstProduct->consumption_slug]);
        }

        // Dacă nu există produse în acea categorie, arată un mesaj sau redirecționează
        return redirect()->back()->with('error', 'Nu există produse în această categorie.');
    }

    public function show($consumption_slug, Request $request)
    {
        // Găsește produsul după consumption_slug
        $product = Product::where('consumption_slug', $consumption_slug)
            ->with(['categories', 'largeImage', 'variations', 'reviews', 'technicalFile'])
            ->firstOrFail();
    
        // Obține categoria principală a produsului (dacă există)
        $category = $product->categories->first();
    
        // Pregătește alte date necesare pentru pagina de consum
        $consumData = $this->getConsumDataByProduct($product);
    
        // Verifică dacă este pagina `/calculate`
        $isCalculatePage = str_contains($request->url(), '/calculate');
    
        // Setăm currentPage la 3 doar dacă suntem pe o pagină de calcul
        $currentPage = $isCalculatePage ? 3 : $request->input('currentPage', 0);
    
        // Verifică dacă există datele necesare în request pentru a calcula consumul
        $result = null;
        if ($isCalculatePage || $request->has(['calculate', 'product_id', 'TipProdus', 'TipSuprafata', 'Suprafata'])) {
            $calculationData = $request->all();
            $result = $this->calculateConsumption($calculationData);
        }
    
        return view('consum.view', [
            'product' => $product,
            'category' => $category,
            'consumData' => $consumData,
            'currentPage' => $currentPage, // Trimitem currentPage către view
            'result' => $result,
        ]);
    }
    

    public function store(Request $request)
    {
        $data = $request->except(['_token', 'consumption_slug']); // Eliminăm `_token` și `consumption_slug`

        // Construiește URL-ul corect fără `consumption_slug`
        return redirect()->to(url($request->input('product_id') . '/calculate') . '?' . http_build_query($data));
    }



    public function calculateConsumption($data)
    {
        // Prelucrează datele și execută scriptul corespunzător
        $product_id = $data['product_id'];
        $product = Product::find($product_id);
        $consum_data = $this->getConsumDataByProduct($product);

         // Setează variabilele $_GET în funcție de datele din $data
        $_GET['TipSuprafata'] = $data[$consum_data['suprafata_type_name']];
        $_GET['Suprafata'] = $data[$consum_data['suprafata_name']];
        $_GET['TipProdus'] = $consum_data['vopsea_type'];

        // Verifică dacă $_GET are datele așteptate
        // dd($_GET);

        $script_name = $product->consumption_slug . '.php';
        $script_path = app_path('Http/Controllers/consumuri_scripts/' . $script_name);

        if (file_exists($script_path)) {
            // Bufferizarea output-ului pentru a captura rezultatul
            ob_start();

            // Include fișierul de script și execută-l
            include $script_path;

            // Capturează și returnează output-ul HTML generat de script
            $html_result = ob_get_clean();
            return $html_result;
        } else {
            return '<p>Nu există un script disponibil pentru calculul acestui produs.</p>';
        }
    }

    private function getConsumDataByProduct($product)
    {
        // Specificăm calea către fișierul CSV din directorul public
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