<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class UpdateProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $jsonFile = resource_path('json/productsImport.json');
        $products = array_values((array)json_decode(file_get_contents($jsonFile), true))[2]['data'];

        foreach ($products as $product) {
            $dbProduct = Product::where('slug', $product['slug'])->first();

            $consumptionSeo = [];
            foreach($product as $key => $value) {
                if(strpos($key, 'consum_seo_') !== false) {
                    $consumptionSeo[substr($key, 11)] = $value;
                }
            }

            $dbProduct->update([
                'consumption_seo' => $consumptionSeo,
                'jsonld' => [
                    'description' => $product['jsonld_description'],
                ],
                'consumption_jsonld' => [
                    'description' => $product['consum_jsonld_description'],
                ]
            ]);
        }
    }
}
