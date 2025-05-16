<?php

namespace App\Console\Commands;

use App\Models\Product;
use DOMDocument;
use Illuminate\Console\Command;
use PHPUnit\Event\Runtime\PHP;

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
        // $jsonFile = resource_path('json/productsImport.json');
        // $products = array_values((array)json_decode(file_get_contents($jsonFile), true))[2]['data'];

        $products = Product::all();

        foreach ($products as $product) {
            // $consumptionSeo = [];
            // foreach($product as $key => $value) {
            //     if(strpos($key, 'consum_seo_') !== false) {
            //         $consumptionSeo[substr($key, 11)] = $value;
            //     }
            // }

            // $dbProduct->update([
            //     'consumption_seo' => $consumptionSeo,
            //     'jsonld' => [
            //         'description' => $product['jsonld_description'],
            //     ],
            //     'consumption_jsonld' => [
            //         'description' => $product['consum_jsonld_description'],
            //     ]
            // ]);

            $description = $product->description;
            $document = new DOMDocument();
            libxml_use_internal_errors(true);
            $document->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_use_internal_errors(false);

            $ampImg = $document->getElementsByTagName('amp-img');

            if ($ampImg[0]) {
                print_r($product['slug'] . PHP_EOL);
                $attributes = $ampImg[0]->attributes;

                $newImage = $document->createElement('img');

                foreach ($attributes as $key => $value) {
                    if ($key == 'src') {
                        $newImage->setAttribute($key, rawurldecode($value->nodeValue));
                    }
                    else if($key == 'width' || $key == 'height' || $key == 'title' || $key == 'alt') {
                        $newImage->setAttribute($key, $value->nodeValue);
                    }
                }

                $ampImg[0]->parentNode->replaceChild($newImage, $ampImg[0]);

                $newDescription = $document->saveHTML();

                $product->description = $newDescription;
                $product->save();
            }
        }
    }
}
