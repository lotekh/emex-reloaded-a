<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    private $exceptFromPreturiCulori = ['5946143065566', '5946143065573'];

    public function bizooV2()
    {
        /* XML string */
        $xml = "<products>";
        $products = $this->getFeedProducts();

        foreach ($products as $product) {
            $slug = $this->generateSlugFromLink($product['link']);

            $db_product = $this->getDatabaseProduct($slug);
            if ($db_product) {
                $description = $db_product->description . ' ' . $db_product->usage_details;
                $description = substr($description, 0, 3950) . '... [mai multe detalii pe site]';
                $description = str_replace('–', '', $description);

                $price = substr($product['price'], 0, strpos($product['price'], 'RON') - 1);
                if ($product['availability'] == 'in stock') {
                    $availability = 1;
                } else {
                    $availability = 0;
                }

                $xml .= '
                <product>
                    <id>
                        ' . $product['gtin'] . '
                    </id>
                    <name>
                        <![CDATA[' . $product['title'] . ']]>
                    </name>
                    <category>
                        <![CDATA[' . $product['product_type'] . ']]>
                    </category>
                    <model>
                        <![CDATA[' . $product['title'] . ']]>
                    </model>
                    <keywords>
                        <![CDATA[' . $db_product->seo['meta_keywords'] . ']]>
                    </keywords>
                    <price>
                        ' . $price . '
                    </price>
                    <available>
                        ' . $availability . '
                    </available>
                    <canBeOrderedOnline>
                        1
                    </canBeOrderedOnline>
                    <details>
                        <![CDATA[' . $description . ']]>
                    </details>
                    <pictures>
                        <picture>
                            <![CDATA[' . $db_product->largeImage->url . ']]>
                        </picture>
                    </pictures>
                    <currency>
                        RON
                    </currency>
                </product>';
            }
        }

        $xml .= '       
        </products>
        ';

        $xml = str_replace('&mu', '', $xml);
        $xml = str_replace('&nbsp', '', $xml);
        $xml = str_replace('&deg', '', $xml);
        $xml = str_replace('&', '', $xml);

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }

    public function compari()
    {
        $csv = public_path('feed/compari.csv');

        $products = $this->getFeedProducts();

        $contents = 'category, manufacturer, name, description, price, image_url, product_url, delivery_time, delivery_cost, identifier, ean_code, ' . "\r\n";

        $count = 0;
        foreach ($products as $product) {
            $slug = $this->generateSlugFromLink($product['link']);
            $db_product = $this->getDatabaseProduct($slug);
            if ($db_product) {
                $description = $db_product->description . ' ' . $db_product->usage_details;
                $description = substr($description, 0, 3950) . '... [mai multe detalii pe site]';
                $description = trim(preg_replace("/\r|\n/", "", str_replace('    ', '', strip_tags(substr($description, 0, strpos($description, '<p class="Caracteristici">'))))));
                $description = '"' . $description . '"';
                $product['title'] = '"' . $product['title'] . '"';

                $contents .= $product['compari_category'] . ', Romtehnochim SRL,' . $product['title'] . ',' . $description . ', ' . $product['price'] . ', ' . $product['image_link'] . ', ' . $product['link']  . ', 3 zile, 50,' . $product['gtin'] . ', ' . $product['id'] . ", \r\n";
                $count++;
            }
        }

        file_put_contents($csv, $contents);
        echo 'Compari feed updated.' . "\n";

        return 0;
    }

    public function price()
    {
        $products = Product::all();

        $string = '';

        foreach ($products as $product) {
            $categoriesProducts = $product->categories;
            
            foreach ($categoriesProducts as $categoryProduct) {
                $category_name = $categoryProduct->name;
                break;
            }

            $description = trim(preg_replace("/\r|\n/", "", str_replace('    ', '', strip_tags(substr($product->description, 0, strpos($product->description, '<p class="Caracteristici">'))))));
            $description = str_replace('“', '', $description);
            $description = str_replace('”', '', $description);
            $description = '"' . $description . '"';
            $product_url = 'https://emex.ro/' . $product->slug;
            $image_url = $product->largeImage->url;

            $products_details = $product->variations;
            foreach ($products_details as $product_details) {
                if(!in_array($product_details['ean'], $this->exceptFromPreturiCulori) && !strpos($string, $product_details['ean'])) {
                    $price = $product_details['price_integer'] . '.' . $product_details['price_decimals'];
                    echo '<p style="white-space: nowrap">' . $product_details['ean']  . ' | ' . $category_name . ' | Romtehnochim SRL | ' . $product_details['name'] . ' | ' . $product_details['sku'] . ' | ' . $price . ' | ron | pe stoc | transportul variaza in functie de localitate si de cantitatea comandata | ' . $image_url . ' | ' . $product_url . ' | ' . $description . ' \n </p> ';
                    echo "\r\n";
                    $string .= ' ' . $product_details['ean'];
                }
            }
        }
    }

    public function shopmania()
    {
        header("Content-type: text/csv");
        header("Content-Transfer-Encoding: UTF-8");
        header("Content-Disposition: attachment; filename=shopmania.csv");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo 'Cod produs (SKU), Cod EAN, Nume produs, Descriere produs, Pret produs, Categorie principala, Producator, Descriere meta, URL imagine principala, Stoc, Disponibilitate, Cuvinte cheie (tag-uri), Moneda, Greutate produs, Brand, Fisa Tehnica, Link Produs' . "\r\n";

        $products = Product::all();

        $string = '';

        foreach ($products as $product) {
            $categoriesProducts = $product->categories;
            foreach ($categoriesProducts as $categoryProduct) {
                $category_name = $categoryProduct->name;
                break;
            }

            $description = trim(preg_replace("/\r|\n/", "", str_replace('    ', '', strip_tags(substr($product->description, 0, strpos($product->description, '<p class="Caracteristici">'))))));
            $description = str_replace('“', '', $description);
            $description = str_replace('”', '', $description);
            $description = '"' . $description . '"';
            $product_url = 'https://emex.ro/' . $product->slug;
            $image_url = $product->largeImage->url;
            $fisa_tehnica = 'https://emex.ro' . $product->technicalFile->url;

            $products_details = $product->variations;
            foreach ($products_details as $product_details) {
                if(!in_array($product_details['ean'], $this->exceptFromPreturiCulori) && !strpos($string, $product_details['ean'])) {
                    $string .= ', ' . $product_details['ean'];
                    $price = $product_details['price'];
                    $weight = intval($product_details['weight']);
                    echo $product_details['sku'] . ', ' . $product_details['ean'] . ', ' . $product_details['name'] . ',' . $description . ', ' . $price . ', ' . $category_name . ', Romtehnochim SRL,"' . $product->seo['meta_description'] . '", ' . $image_url . ', stock_unlimited, Disponibil in stoc,"' .  $product->seo['meta_keywords'] . '", RON, ' . $weight . ', Emex,' . $fisa_tehnica . ', ' . $product_url . "\r\n";
                }
            }
        }
    }

    public function shopmaniaRo() 
    {
        $datafeed_separator = '|';

        $string = '';

        echo '<pre>';

        $products = $this->getFeedProducts();

        foreach ($products as $product) {
            $slug = $this->generateSlugFromLink($product['link']);
            $db_product = $this->getDatabaseProduct($slug);
            if ($db_product) {
                $description = trim(preg_replace("/\r|\n/", "", str_replace('    ', '', strip_tags(substr($db_product->description, 0, strpos($db_product->description, '<p class="Caracteristici">'))))));
                $description = str_replace('“', '', $description);
                $description = str_replace('”', '', $description);
                $description = '"' . $description . '"';
                $product_url = 'https://emex.ro/' . $db_product->slug;
                $image_url = $db_product->largeImage->url;
                $price = $product['price'];

                $string .= 
                $product['product_type'] . $datafeed_separator . 
                'Romtehnochim SRL' . $datafeed_separator . 
                $product['title'] . $datafeed_separator . 
                $db_product->sku . $datafeed_separator . 
                $product['title'] . $datafeed_separator . 
                $description . $datafeed_separator . 
                $product_url . $datafeed_separator . 
                $image_url . $datafeed_separator . 
                $price . $datafeed_separator . 
                'RON' . $datafeed_separator . 
                'In stock' . $datafeed_separator . 
                $product['gtin'] . "\n";
            }
        }

        echo $string;
    }

    public function clubAfaceri()
    {
        $csv = public_path('feed/club-afaceri.csv');
        $contents = '';

        $products = Product::all();

        $string = '';

        foreach ($products as $product) {
            $categoriesProducts = $product->categories;
            foreach ($categoriesProducts as $categoryProduct) {
                $category_name = $categoryProduct->name;
                $category_id = $categoryProduct->id;
                break;
            }

            $description = trim(preg_replace("/\r|\n/", "", str_replace('    ', '', strip_tags(substr($product->description, 0, strpos($product->description, '<p class="Caracteristici">'))))));
            $description = str_replace('“', '', $description);
            $description = str_replace('”', '', $description);
            $description = '"' . $description . '"';
            $image_url = $product->largeImage->url;
            $keywords = explode(', ', $product->seo['meta_keywords']);

            $products_details = $product->variations;

            foreach ($products_details as $product_details) {
                if(!in_array($product_details['ean'], $this->exceptFromPreturiCulori) && !strpos($string, $product_details['ean'])) {
                    $string .= ' ' . $product_details['ean'];

                    $price = round(floatval($product_details['price_integer'] . '.' . $product_details['price_decimals']) * 1.14, 2);
                    $contents .= '"' . base64_encode($category_id) . '",';
                    $contents .= '"' . base64_encode($category_name) . '",';
                    $contents .= '"' . base64_encode($product_details['name']) . '",';
                    $contents .= '"' . base64_encode($product_details['ean']) . '",';
                    $contents .= '' . base64_encode($description) . ',';
                    $contents .= '"' . base64_encode($image_url) . '",';
                    if (count($keywords) >= 1) {
                        $contents .= '"' . base64_encode($keywords[0]) . '",';
                    } else {
                        $contents .= '"",';
                    }
                    if (count($keywords) >= 2) {
                        $contents .= '"' . base64_encode($keywords[1]) . '",';
                    } else {
                        $contents .= '"",';
                    }
                    if (count($keywords) >= 3) {
                        $contents .= '"' . base64_encode($keywords[2]) . '",';
                    } else {
                        $contents .= '"",';
                    }
                    $contents .= '"' . base64_encode('Romtehnochim SRL') . '",';
                    $contents .= '"' . base64_encode($price) . '",';
                    $contents .= '"' . base64_encode('RON') . '",';
                    $contents .= "\r\n";
                }
            }
        }

        file_put_contents($csv, $contents);
        echo 'Club afaceri feed updated.' . "\n";

        return 0;
    }

    public function okazii()
    {
        $products = $this->getEmagProducts();
        $productVariations = $this->getVariationCorrespondents($products);

        /* XML string */
        $xml = "<OKAZII>
                    <SETTINGS>
                        <STATE>1</STATE>
                        <INVOICE>1</INVOICE>
                        <WARRANTY>1</WARRANTY>
                        <FORUM>0</FORUM>
                        <PAYMENT>
                            <PERSONAL>1</PERSONAL>
                            <RAMBURS>0</RAMBURS>
                            <AVANS>1</AVANS>
                            <DETAILS>Detalii despre plata</DETAILS>
                        </PAYMENT>
                        <DELIVERY>
                            <PERSONAL>0</PERSONAL>
                            <DELIVERY_TIME>3</DELIVERY_TIME>
                            <DETAILS>Detalii de livrare</DETAILS>
                            <COURIERS>
                                <NAME>alt curier</NAME>
                                <AREA>in romania</AREA>
                                <PRICE>30</PRICE>
                                <CURRENCY>RON</CURRENCY>
                            </COURIERS>
                        </DELIVERY>
                        <RETURN>
                            <ACCEPT>1</ACCEPT>
                            <DAYS>15</DAYS>
                            <METHOD>3</METHOD>
                            <COST>1</COST>
                            <DETAILS>Detalii de retur - https://emex.ro/politica-de-retur </DETAILS>
                        </RETURN>
                    </SETTINGS>";

        $count = 0;
        foreach ($productVariations as $productVariation) {
            $dbProduct = $productVariation->product;

            if ($dbProduct) {
                $count++;
                $description = $dbProduct->description . ' ' . $dbProduct->usage_details;
                $description = substr($description, 0, 3950) . '... [mai multe detalii pe site]';

                $categoryId = $dbProduct->categories->first()->id;
                $categoryName = $dbProduct->categories->first()->name;

                $image_url = $dbProduct->largeImage->url;

                $price = $productVariation['price'];
                $xml .= '<AUCTION>
                            <UNIQUEID>' . $count . '</UNIQUEID>
                            <TITLE>' . $productVariation['name'] . '</TITLE>
                            <CATEGORY>' . $categoryName . '</CATEGORY>
                            <DESCRIPTION><![CDATA[' . $description . ' ]]></DESCRIPTION>
                            <PRICE>' . str_replace(',', '', number_format($price * 1.14, 2)) . '</PRICE>
                            <CURRENCY>RON</CURRENCY>
                            <AMOUNT>1</AMOUNT>
                            <BRAND>Emex</BRAND>
                            <PHOTOS>
                                <URL>' . $image_url . '</URL>
                            </PHOTOS>
                            <ATTRIBUTES>
                                <CULOARE>' . $productVariation['colour'] . '</CULOARE>
                            </ATTRIBUTES>
                            <IN_STOCK>3</IN_STOCK>
                            <SKU>' . $productVariation['sku'] . '</SKU>
                            <GTIN>' . $productVariation['ean'] . '</GTIN>
                        </AUCTION>';
            }
        }

        $xml .= '       
    </OKAZII>';
        $xml = str_replace('&mu', '', $xml);
        $xml = str_replace('&nbsp', '', $xml);
        $xml = str_replace('&deg', '', $xml);
        $xml = str_replace('&', '', $xml);

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }

    public function merxu() 
    {
        // header("Content-type: text/csv; charset=utf-8");
        
        // header("Content-Transfer-Encoding: UTF-8");
        // header("Content-Disposition: attachment; filename=merxu.csv");
        // header("Pragma: no-cache");
        // header("Expires: 0");

        echo 'supplier_product_id, merxu_category_path, name, description, manufacturer, main_image_url, currency, price, vat' . "\r\n";

        $products = Product::all();

        $string = '';

        dd($products);

        foreach ($products as $product) {
            $description = trim(preg_replace("/\r|\n/", "", str_replace('    ', '', strip_tags(substr($product->description, 0, strpos($product->description, '<p class="Caracteristici">'))))));
            $description = str_replace('“', '', $description);
            $description = str_replace('”', '', $description);
            $description = '"' . $description . '"';
            $image_url = $product->largeImage->url;

            $categoryName = 'Materiale și echipamente de construcții/Materiale de finisare/Produse chimice pentru construcții/Vopsele și lacuri';
            $products_details = $product->variations;
            foreach ($products_details as $product_details) {
                if(!in_array($product_details['ean'], $this->exceptFromPreturiCulori) && !strpos($string, $product_details['ean'])) {
                    $string .= ', ' . $product_details['ean'];
                    $price = $product_details['price_no_tva'];
                    echo $product_details['ean'] . ', ' . $categoryName . ', ' . $product_details['name'] . ',' . $description . ', Romtehnochim SRL, ' . $image_url . ', RON, ' . $price . ', 19' . "\r\n";
                }
            }
        }
    }

    public function soline()
    {
        header("Content-type: text/csv; charset=utf-8");
        
        header("Content-Transfer-Encoding: UTF-8");
        header("Content-Disposition: attachment; filename=soline.csv");
        header("Pragma: no-cache");
        header("Expires: 0");

        $products = Products::find()->all();

        $string = '';

        echo 'id, title, description, image_link, availability, price, category, brand' . "\r\n";

        foreach ($products as $product) {
            $categories_products = CategoriesProducts::findAll([
                'product_id' => $product->id
            ]);
            foreach ($categories_products as $category_product) {
                $categoryName = $category_product->category->name;
                break;
            }

            $description = trim(preg_replace("/\r|\n/", "", str_replace('    ', '', strip_tags(substr($product->description, 0, strpos($product->description, '<p class="Caracteristici">'))))));
            $description = str_replace('“', '', $description);
            $description = str_replace('”', '', $description);
            $description = '"' . $description . '"';
            $image_url = $product->largeImage->url;

            $siteController = new SiteController('frontend\controllers\SiteController', '');
            $products_details = $siteController->getProductsColorsPrices($product->slug)['produse'];
            foreach ($products_details as $product_details) {
                if(!in_array($product_details['ean'], $this->exceptFromPreturiCulori) && !strpos($string, $product_details['ean'])) {
                    $string .= ', ' . $product_details['ean'];
                    $price = round(floatval($product_details['price_integer'] . '.' . $product_details['price_decimals']) * 1.18, 2);
                    echo $product_details['sku'] . ', ' . $product_details['name'] . ',' . $description . ', ' . $image_url . ', in stoc, ' . $price . ', ' . $categoryName . ', Romtehnochim SRL' . "\r\n";
                }
            }
        }
    }

    public function checkSlugs() 
    {
        //verifica daca toate slugurile din preturi_culori exista in DB
        $preturiCuloriProducts = $this->getPreturiCuloriProducts();

        echo '<pre>';

        $i = 1;
        foreach($preturiCuloriProducts as $preturiCuloriProduct) {
            $db_product = Products::find()->where([
                'slug' => $preturiCuloriProduct['slug']
            ])->one();
            if(!$db_product) {
                var_dump($i, $preturiCuloriProduct['slug']);
                $i++;
            }
        }
    }

    public function updateFeeds()
    {
        $productVariations = ProductVariation::all();

        $csv = resource_path('feeds/feed.csv');
        $newData = [];
        $feedProducts = $this->getFeedProducts();

        echo '<pre>';

        foreach($feedProducts as $row => $feedProduct) {
            if ($row == 0) {
                $newData[0] = $feedProduct;
            }
            if ($row > 0) {
                $produs = [];
                $produs['price'] = $feedProduct['price'];
                $produs['gtin'] = $feedProduct['gtin'];

                $newData[$row] = [];
                foreach ($feedProduct as $feedProductPiece) {
                    $newData[$row][] = $feedProductPiece;
                }

                $produs['price'] = str_replace(',', '', $produs['price']);
                
                $foundProductVariation = false;

                foreach ($productVariations as $productVariation) {
                    if ($productVariation['ean'] == $produs['gtin']) {
                        $newData[$row][6] = number_format($productVariation['price'], 2) . ' RON';
                        if ($productVariation['price'] != floatval($produs['price'])) {
                        }
                        $foundProductVariation = true;
                    }
                }
                if(!$foundProductVariation) {
                    echo 'did not find: ' . $produs['gtin'] . "\n";
                }
            }
            $row++;
        }

        // EXPORT CSV
        if(!file_exists($csv)) {
            file_put_contents($csv, '');
        }
        
        $fp = fopen($csv, 'w');

        foreach ($newData as $rows) {
            fputcsv($fp, $rows);
        }
        fclose($fp);

        $this->compari();
        $this->clubAfaceri();
        $this->proiectCasa();
    }


    public function getFeedProducts()
    {
        $csv = resource_path('feeds/feed.csv');
        $handler = fopen($csv, "r");
        $row = 0;
        $produse = [];
        while (($data = fgetcsv($handler, 1000, ",")) !== FALSE) {
            if ($row > 0) {
                $produs = [];
                $produs['id'] = $data[0];
                $produs['title'] = $data[1];
                $produs['description'] = $data[2];
                $produs['link'] = $data[3];
                $produs['image_link'] = $data[4];
                $produs['availability'] = $data[5];
                $produs['price'] = $data[6];
                $produs['google_product_category'] = $data[7];
                $produs['product_type'] = $data[8];
                $produs['brand'] = $data[9];
                $produs['gtin'] = $data[10];
                $produs['material'] = $data[11];
                $produs['compari_category'] = '' . $data[12] . '';

                $produs['price'] = str_replace(',', '', $produs['price']);
                $produs['price'] = floatval($produs['price']);
                $produs['price'] = number_format($produs['price'], 2);
                $produs['price'] = str_replace(',', '', $produs['price']);

                $produse[] = $produs;
            }
            $row++;
        }

        return $produse;
    }

    public function getEmagProducts()
    {
        $csv = resource_path('feeds/emag.csv');
        $handler = fopen($csv, "r");
        $row = 0;
        $produse = [];

        while (($data = fgetcsv($handler, 1000, ",")) !== FALSE) {
            if ($row > 0) {
                $produs = [];
                if($data[2]) {
                    $produse[] = $data[2];
                }
            }
            $row++;
        }

        return $produse;
    }

    public function getPreturiCuloriProducts()
    {
        $csv = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'preturi_culori.csv';
        $handler = fopen($csv, "r");
        $row = 0;
        $produse = [];

        while (($data = fgetcsv($handler, 1000, ",")) !== FALSE) {
            if ($row > 0) {
                if (!empty($data[0]) && !empty($data[1]) && !empty($data[2]) && !empty($data[3]) && !empty($data[4]) && !empty($data[5]) && !empty($data[6])) {
                    $produse[$row]['slug'] = $data[0];
                    $produse[$row]['cantitate'] = $data[1];
                    $produse[$row]['color'] = $data[2];
                    $produse[$row]['price'] = $data[5];
                    $produse[$row]['price'] = str_replace(',', '', $produse[$row]['price']);
                    $produse[$row]['name'] = $data[6];
                    $produse[$row]['intaritor'] = $data[7];
                    $produse[$row]['price_no_tva'] = $data[3];
                    $produse[$row]['price_no_tva'] = str_replace(',', '', $produse[$row]['price_no_tva']);
                    $produse[$row]['tva'] = $data[4];
                    $produse[$row]['tva'] = str_replace(',', '', $produse[$row]['tva']);
                    $produse[$row]['ean'] = $data[8];
                    $produse[$row]['sku'] = $data[9];

                    $whole = floor($produse[$row]['price']);
                    $fraction = $produse[$row]['price'] - $whole;
                    $fraction = number_format($fraction, 2);
                    list($x, $decimal) = explode('.', $fraction);

                    $produse[$row]['price_decimals'] = $decimal;
                    $produse[$row]['price_integer'] = $whole;
                }
            }
            $row++;
        }

        return $produse;
    }

    public function getVariationCorrespondents($products)
    {
        return ProductVariation::whereIn('ean', $products)->get();
    }

    public function generateSlugFromLink($link) {
        $slug = $link;
        $slug = explode('/', $slug);
        $slug = $slug[count($slug) - 1];

        return $slug;
    }

    public function getDatabaseProduct($link)
    {
        return Product::where('slug', $link)->first();
    }

    public function getDatabaseProductWithSlug($slug)
    {
        $product_id = Slugs::find()->where([
            'type' => 'product',
            'slug' => $slug
        ])->one();
        if ($product_id) {
            $db_product = Products::find()->where([
                'id' => $product_id->entity_id
            ])->one();

            if ($db_product) {
                return $db_product;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function proiectCasa()
    {
        $csv = public_path('feed/proiect-casa.csv');

        $products = $this->getFeedProducts();

        $contents = 'campaign_name, widget_name, title, description, price, category, subcategory, url, image_urls, product_id, other_data, model, dimensiune' . "\r\n";

        foreach ($products as $product) {
            $slug = $this->generateSlugFromLink($product['link']);
            $db_product = $this->getDatabaseProduct($slug);
            if ($db_product) {
                $description = $db_product->description . ' ' . $db_product->usage_details;
                $description = substr($description, 0, 3950) . '... [mai multe detalii pe site]';
                $description = trim(preg_replace("/\r|\n/", "", str_replace('    ', '', strip_tags(substr($description, 0, strpos($description, '<p class="Caracteristici">'))))));
                $description = '"' . $description . '"';

                $data['campaign_name'] = 'emex.ro';
                $data['widget_name'] = 'Produse Emex.ro';
                $data['title'] = $product['title'];
                $data['description'] = $description;
                $data['price'] = $product['price'].' RON';
                $data['category'] = $product['google_product_category'];
                $data['subcategory'] = '';
                $data['url'] = $product['link'];
                $data['image_urls'] = $product['image_link'];
                $data['product_id'] = $product['gtin'];
                $data['other_data'] = '';
                $data['model'] = '';
                $data['dimensiune'] = '';

                $contents .= implode(',', $data)."\r\n";
            }
        }

        file_put_contents($csv, $contents);
        echo 'ProiectCasa feed updated.' . "\n";

        return 0;
    }

    public function findDuplicatesInPreturiCulori() {
        $csv = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'preturi_culori.csv';
        $handler = fopen($csv, "r");
        $row = 0;
        $preturiCuloriProducts = [];

        while (($data = fgetcsv($handler, 1000, ",")) !== FALSE) {
            if ($row > 0) {
                if (!empty($data[0]) && !empty($data[1]) && !empty($data[2]) && !empty($data[3]) && !empty($data[4]) && !empty($data[5]) && !empty($data[6])) {
                    $preturiCuloriProducts[$row]['slug'] = $data[0];
                    $preturiCuloriProducts[$row]['cantitate'] = $data[1];
                    $preturiCuloriProducts[$row]['color'] = $data[2];
                    $preturiCuloriProducts[$row]['price'] = $data[5];
                    $preturiCuloriProducts[$row]['price'] = str_replace(',', '', $preturiCuloriProducts[$row]['price']);
                    $preturiCuloriProducts[$row]['name'] = $data[6];
                    $preturiCuloriProducts[$row]['intaritor'] = $data[7];
                    $preturiCuloriProducts[$row]['price_no_tva'] = $data[3];
                    $preturiCuloriProducts[$row]['price_no_tva'] = str_replace(',', '', $preturiCuloriProducts[$row]['price_no_tva']);
                    $preturiCuloriProducts[$row]['tva'] = $data[4];
                    $preturiCuloriProducts[$row]['tva'] = str_replace(',', '', $preturiCuloriProducts[$row]['tva']);
                    $preturiCuloriProducts[$row]['ean'] = $data[8];
                    $preturiCuloriProducts[$row]['sku'] = $data[9];

                    $whole = floor($preturiCuloriProducts[$row]['price']);
                    $fraction = $preturiCuloriProducts[$row]['price'] - $whole;
                    $fraction = number_format($fraction, 2);
                    list($x, $decimal) = explode('.', $fraction);

                    $preturiCuloriProducts[$row]['price_decimals'] = $decimal;
                    $preturiCuloriProducts[$row]['price_integer'] = $whole;
                }
            }
            $row++;
        }

        $eans = [];
        foreach($preturiCuloriProducts as $preturiCuloriProduct) {
            if(isset($eans[$preturiCuloriProduct['ean']])) {
                $eans[$preturiCuloriProduct['ean']]++;
            }
            else {
                $eans[$preturiCuloriProduct['ean']] = 1;
            }
        }
        echo '<pre>';
        foreach($eans as $key => $ean) {
            if($ean > 1)
                echo $key . '->' . $ean . "\n";
        }
    }

    public function adtob() {
        // $products = Products::find()->all();

        // $string = '';

        // $siteController = new SiteController('frontend\controllers\SiteController', '');

        // header("Content-type: text/csv");
        // header("Content-Transfer-Encoding: UTF-8");
        // header("Content-Disposition: attachment; filename=adtob.csv");
        // header("Pragma: no-cache");
        // header("Expires: 0");

        // $out = fopen('php://output', 'w');

        // fputcsv($out, array('Categorie', 'Subcategorie', 'Brand', 'Model', 'Cod produs', 'Nume', 'Descriere', 'URL imagine', 'Pret', 'Tip valuta', 'Tip transport', 'Valabilitate', 'Gtin'), '|');

        // // echo 'Categorie| Subcategorie| Brand| Model| Cod produs| Nume| Descriere| URL imagine| Pret| Tip valuta| Tip transport| Valabilitate| Gtin' . "\r\n";

        // foreach ($products as $product) {
        //     $categories_products = CategoriesProducts::findAll([
        //         'product_id' => $product->id
        //     ]);
        //     foreach ($categories_products as $category_product) {
        //         $category_name = $category_product->category->name;
        //         break;
        //     }

        //     $description = trim(preg_replace("/\r|\n/", "", str_replace('    ', '', strip_tags(substr($product->description, 0, strpos($product->description, '<p class="Caracteristici">'))))));
        //     $description = str_replace('“', '', $description);
        //     $description = str_replace('”', '', $description);
        //     // $description = '"' . $description . '"';
        //     // var_dump($description);
        //     // die();
            
        //     $product_url = 'https://emex.ro/' . $product->slug;
        //     $image_url = 'https://emex.ro' . $product->largeImage->url;

        //     $products_details = $siteController->getProductsColorsPrices($product->slug)['produse'];
        //     foreach ($products_details as $product_details) {
        //         if(!strpos($string, $product_details['ean'])) {
        //             $price = $product_details['price_integer'] . '.' . $product_details['price_decimals'];
        //             // echo $category_name . '| ' . '| ' . 'Emex' . '| ' . '| ' . $product_details['ean'] . '| ' . $product_details['name'] . '|' . $description . '| ' . $image_url . '| ' . $price . '| ' . 'RON' . '| ' . 'curier sau ridicare personala' . '| ' . '| ' . "\r\n";
                    
        //             fputcsv($out, array($category_name, '', 'Emex', '', $product_details['ean'], $product_details['name'],$description, $image_url, $price, 'RON', 'curier sau ridicare personala', ''), '|');
        //             $string .= ' ' . $product_details['ean'];
        //         }
        //     }
        // }

        // fclose($out);

        $products = Products::find()->all();

        $string = '';

        $siteController = new SiteController('frontend\controllers\SiteController', '');

        // header("Content-type: text/csv");
        // header("Content-Transfer-Encoding: UTF-8");
        // header("Content-Disposition: attachment; filename=adtob.csv");
        // header("Pragma: no-cache");
        // header("Expires: 0");

        // echo 'Categorie, Subcategorie, Brand, Model, Cod produs, Nume, Descriere, URL imagine, Pret, Tip valuta, Tip transport, Valabilitate, Gtin' . "\r\n";

        $duplicates = [];
        foreach ($products as $product) {
            $categories_products = CategoriesProducts::findAll([
                'product_id' => $product->id
            ]);
            foreach ($categories_products as $category_product) {
                $category_name = $category_product->category->name;
                break;
            }

            $description = trim(preg_replace("/\r|\n/", "", str_replace('    ', '', strip_tags(substr($product->description, 0, strpos($product->description, '<p class="Caracteristici">'))))));
            $description = str_replace('“', '', $description);
            $description = str_replace('”', '', $description);
            $description = '"' . $description . '"';
            
            $product_url = 'https://emex.ro/' . $product->slug;
            $image_url = $product->largeImage->url;


            $products_details = $siteController->getProductsColorsPrices($product->slug)['produse'];
            foreach ($products_details as $product_details) {
                if(!in_array($product_details['ean'], $this->exceptFromPreturiCulori) && !strpos($string, $product_details['ean'])) {
                    $price = $product_details['price_integer'] . '.' . $product_details['price_decimals'];
                    // echo $category_name . ', ' . ', ' . 'Emex' . ', ' . ', ' . $product_details['ean'] . ', ' . $product_details['name'] . ',' . $description . ', ' . $image_url . ', ' . $price . ', ' . 'RON' . ', ' . 'curier sau ridicare personala' . ', ' . ', ' . "\r\n";
                    $datafeed_separator = '|';
                    print  
                    $category_name . $datafeed_separator . 
                    '' . $datafeed_separator .
                    'Emex' . $datafeed_separator .
                    '' . $datafeed_separator .   
                    $product_details['ean'] . $datafeed_separator . 
                    $product_details['name'] . $datafeed_separator . 
                    $description . $datafeed_separator .
                    $image_url . $datafeed_separator .  
                    $price . $datafeed_separator .
                    'RON' . $datafeed_separator .
                    'curier sau ridicare personala' . $datafeed_separator . 
                    '' . $datafeed_separator .
                    ''. "\n";
                    $string .= ' ' . $product_details['ean'];
                }
                else {
                    $duplicates[] = $product_details['ean'];
                }
            }
        }

        // var_dump('duplicates', $duplicates); die();
    }

    public function esell() {
        header("Content-type: text/csv");
        header("Content-Transfer-Encoding: UTF-8");
        header("Content-Disposition: attachment; filename=esell.csv");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo 'ID Produs, Cod Produs, Nume Produs, Descriere, Pret, Pret vechi, Categorie, Stoc, URL Imagine 1, URL Imagine 2, URL Imagine 3, URL Imagine 4' . "\r\n";

        $products = $this->getEmagProducts();
        $products = $this->getVariationCorrespondents($products);
        
        foreach ($products as $key => $product) {
            $dbProduct = $this->getDatabaseProductWithSlug($product['slug']);

            if ($dbProduct) {
                $categories_products = CategoriesProducts::findAll([
                    'product_id' => $dbProduct->id
                ]);

                foreach ($categories_products as $category_product) {
                    $category_name = $category_product->category->name;
                    break;
                }

                $description = trim(preg_replace("/\r|\n/", "", str_replace('    ', '', strip_tags(substr($dbProduct->description, 0, strpos($dbProduct->description, '<p class="Caracteristici">'))))));
                $description = str_replace('“', '', $description);
                $description = str_replace('”', '', $description);
                $description = '"' . $description . '"';
                $product_url = 'https://emex.ro/' . $dbProduct->slug;
                $image_url = $dbProduct->largeImage->url;
                $fisa_tehnica = 'https://emex.ro' . $dbProduct->fisa_tehnica;

                $price = round(floatval($product['price_integer'] . '.' . $product['price_decimals']) * 1.1, 2);
                echo $product['sku'] . ', ' . $product['ean'] . ', ' . $product['name'] . ',' . $description . ', ' . $price . ', ,' . $category_name . ', 100,'  . $image_url . ', , ,'. "\r\n";
            }
        }
    }

    public function maniaMall() {
        header("Content-type: text/csv");
        header("Content-Transfer-Encoding: UTF-8");
        header("Content-Disposition: attachment; filename=mania-mall.csv");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo 'Cod produs, Nume produs, Brand/producator, Categorie produs, Descriere, Stoc, Pret, URL poza' . "\r\n";

        $products = $this->getEmagProducts();
        $products = $this->getVariationCorrespondents($products);
        
        foreach ($products as $key => $product) {
            $dbProduct = $this->getDatabaseProductWithSlug($product['slug']);

            if ($dbProduct) {
                $categories_products = CategoriesProducts::findAll([
                    'product_id' => $dbProduct->id
                ]);

                foreach ($categories_products as $category_product) {
                    $category_name = $category_product->category->name;
                    break;
                }

                $description = trim(preg_replace("/\r|\n/", "", str_replace('    ', '', strip_tags(substr($dbProduct->description, 0, strpos($dbProduct->description, '<p class="Caracteristici">'))))));
                $description = str_replace('“', '', $description);
                $description = str_replace('”', '', $description);
                $description = '"' . $description . '"';
                $product_url = 'https://emex.ro/' . $dbProduct->slug;
                $image_url = $dbProduct->largeImage->url;
                $fisa_tehnica = 'https://emex.ro' . $dbProduct->fisa_tehnica;

                $price = round(floatval($product['price_integer'] . '.' . $product['price_decimals']) * 1.14, 2);
                echo $product['sku'] . ', ' . $product['name'] . ', Romtehnochim SRL,' . $category_name  . ',' . $description . ', 100, ' . $price . ', '  . $image_url . "\r\n";
            }
        }
    }

    public function anuntulOnline() 
    {
        $content = new stdClass();
        $content->anunturi = array();

        $products = Products::find()->all();
        $all_products_details = $this->getPreturiCuloriProducts();

        $string = '';
        $all_products_details = (array) $all_products_details;

        $categoryName = 'Casa si gradina > Materiale constructii, amenajari > vopsele, zidarii, tencuieli';

        foreach ($products as $product) {
            $description = trim(preg_replace("/\r|\n/", "", str_replace('    ', '', strip_tags(substr($product->description, 0, strpos($product->description, '<p class="Caracteristici">'))))));
            $description = str_replace('“', '', $description);
            $description = str_replace('”', '', $description);
            $description = '"' . $description . '"';
            $image_url = $product->largeImage->url;

            $products_details = array_filter($all_products_details, function ($value) use ($product) {
                return $value['slug'] == $product->slug;
            });

            foreach ($products_details as $product_details) {
                $product_details = (array) $product_details;

                if(!in_array($product_details['ean'], ['5946143065566', '5946143065573']) && !strpos($string, $product_details['ean'])) {
                    $string .= ', ' . $product_details['ean'];
                    $price = $product_details['price_no_tva'];

                    $anunt = new StdClass();
                    $anunt->id_anunt_intern = $product_details['ean'];
                    $anunt->categorie = $categoryName;
                    $anunt->tip_vanzator = 1; 
                    $anunt->titlu = $product_details['name'];
                    $anunt->text_anunt = $product_details['name'];
                    $anunt->description = $description;
                    $anunt->pret = $price;
                    $anunt->pret_nou = $price;
                    $anunt->pana_cand = strtotime('+1 day');  
                    $anunt->moneda = 3;  
                    $anunt->imagini = array($image_url); 
                    $anunt->idjud = 10; 
                    $anunt->telefon1 = '+40724-509.552';  
                    $anunt->telefon2 = '+4021-457.1646'; 
                    $anunt->email = 'vanzari@emex.ro'; 
                    $anunt->link_produs = 'https://emex.ro/' . $product_details['slug']; 

                    $content->anunturi[] = $anunt;
                }
            }
        }

        header('Content-Type: text/xml; charset=utf-8');
        echo $this->encodeObj($content);
        
        exit();
    }

    public function teamdeals() {
        header("Content-type: text/csv");
        header("Content-Transfer-Encoding: UTF-8");
        header("Content-Disposition: attachment; filename=teamdeals.csv");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo 'Categorie, Producator, Cod Produs, Model, Nume produs, Descriere produs, URL produs, URL imagine, Pret, Moneda, Cost livrare, Greutate, Numar zile livrare, Numar vouchere, Stoc, Imagini suplimentare
        ' . "\r\n";

        $products = $this->getEmagProducts();
        $products = $this->getVariationCorrespondents($products);
        
        foreach ($products as $key => $product) {
            $dbProduct = $this->getDatabaseProductWithSlug($product['slug']);

            if ($dbProduct) {
                $categories_products = CategoriesProducts::findAll([
                    'product_id' => $dbProduct->id
                ]);

                foreach ($categories_products as $category_product) {
                    $category_name = $category_product->category->name;
                    break;
                }

                $description = trim(preg_replace("/\r|\n/", "", str_replace('    ', '', strip_tags(substr($dbProduct->description, 0, strpos($dbProduct->description, '<p class="Caracteristici">'))))));
                $description = str_replace('“', '', $description);
                $description = str_replace('”', '', $description);
                $description = '"' . $description . '"';
                $product_url = 'https://emex.ro/' . $dbProduct->slug;
                $image_url = $dbProduct->largeImage->url;
                $fisa_tehnica = 'https://emex.ro' . $dbProduct->fisa_tehnica;

                $price = round(floatval($product['price_integer'] . '.' . $product['price_decimals']) * 1.21, 2);
                echo $category_name . ', Romtehnochim SRL, ' . $product['ean'] . ', -, ' . $product['name'] . ',' . $description . ', ' . $product_url . ', ' . $image_url . ', ' . $price . ', ' . 'RON' . ', , , , , 20, ,' . "\r\n";
            }
        }
    }

    public function practicMagazin() {
         /* XML string */
         $xml = "<produse>";
         $products = $this->getFeedProducts();
 
         foreach ($products as $product) {
             $db_product = $this->getDatabaseProduct($product['link']);
             if ($db_product) {
                 $description = $db_product->description . ' ' . $db_product->usage_details;
                 $description = substr($description, 0, 3950) . '... [mai multe detalii pe site]';
                 $description = str_replace('–', '', $description);
                 // $description = str_replace('“','"', $description);
                 // $description = str_replace('”','"', $description);
 
                 $price = substr($product['price'], 0, strpos($product['price'], 'RON') - 1);
                 if ($product['availability'] == 'in stock') {
                     $availability = 1;
                 } else {
                     $availability = 0;
                 }
 
                 $xml .= '
                 <produs>
                     <cod_produs>
                         ' . $product['gtin'] . '
                     </cod_produs>
                     <nume>
                         ' . $product['title'] . '
                     </nume>
                     <descriere>
                        <![CDATA[' . $description . ']]>
                     </descriere>
                     <categorie>
                         ' . $product['product_type'] . '
                     </categorie>
                     <pret>
                         ' . $price . '
                     </pret>
                     <cuvinte_cheie>
                         ' . $db_product->seo['meta_keywords'] . '
                     </cuvinte_cheie>
                     <foto>
                        ' . $product['image_link'] . '
                     </foto>
                 </produs>';
             }
         }
 
         $xml .= '       
         </produse>
         ';
 
         $xml = str_replace('&mu', '', $xml);
         $xml = str_replace('&nbsp', '', $xml);
         $xml = str_replace('&deg', '', $xml);
         $xml = str_replace('&', '', $xml);
 
         // header('Content-type: text/xml');
         Yii::$app->response->format = Response::FORMAT_RAW;
         Yii::$app->response->headers->add('Content-Type', 'text/xml');
         Yii::$app->response->content = $xml;
         return Yii::$app->response;
    }

    public function encodeObj($obj, $root_node = 'root') {
        $xml = '<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL;
        $xml .= self::encode($obj, $root_node, $depth = 0);
        return $xml;
    }
        
    private function encode($data, $node, $depth) {
        if( $depth == 1 ) $node = "anunturi"; 
        elseif( $depth == 2 ) $node = "anunt"; 
            
        $xml = str_repeat("\t", $depth);
        $xml .= "<{$node}>" . PHP_EOL;
        
        foreach($data as $key => $val) {
            if(is_array($val) || is_object($val)) {
                if( is_numeric($key) ) {
                    $key = $node;
                }
                    
                $xml .= self::encode($val, $key, ($depth + 1));
            } 
            else {
                $xml .= str_repeat("\t", ($depth + 1));
                if( is_numeric($key) ) {
                    $xml .= "<camp id=\"".$key."\" value=\"".htmlspecialchars($val)."\" />" . PHP_EOL;
                }
                else	  
                    $xml .= "<{$key}><![CDATA[" . htmlspecialchars($val) . "]]></{$key}>" . PHP_EOL;
            }
        }
        $xml .= str_repeat("\t", $depth);
        $xml .= "</{$node}>" . PHP_EOL;
        return $xml;
    }

    public function negociat() {
        header("Content-type: text/csv");
        header("Content-Transfer-Encoding: UTF-8");
        header("Content-Disposition: attachment; filename=negociat.csv");
        header("Pragma: no-cache");
        header("Expires: 0");

        $products = $this->getEmagProducts();
        $products = $this->getVariationCorrespondents($products);
        
        foreach ($products as $key => $product) {
            $dbProduct = $this->getDatabaseProductWithSlug($product['slug']);

            if ($dbProduct) {
                $categories_products = CategoriesProducts::findAll([
                    'product_id' => $dbProduct->id
                ]);

                foreach ($categories_products as $category_product) {
                    $category_name = $category_product->category->name;
                    break;
                }

                $description = trim(preg_replace("/\r|\n/", "", str_replace('    ', '', strip_tags(substr($dbProduct->description, 0, strpos($dbProduct->description, '<p class="Caracteristici">'))))));
                $description = str_replace('“', '', $description);
                $description = str_replace('”', '', $description);
                $description = '"' . $description . '"';
                $product_url = 'https://emex.ro/' . $dbProduct->slug;
                $image_url = $dbProduct->largeImage->url;
                $fisa_tehnica = 'https://emex.ro' . $dbProduct->fisa_tehnica;

                $price = round(floatval($product['price_integer'] . '.' . $product['price_decimals']) * 1.21, 2);
                $higherPrice = $price * 1.05;
                $higherPrice = round($higherPrice, 2);
                echo $product['ean'] . '|' . $product['name'] . '|' . $category_name . '|Romtehnochim SRL|' . $price . '|' . $higherPrice . '|' . $description . '|' . $image_url . '|100'. "\r\n";
            }
        }
    }
}
